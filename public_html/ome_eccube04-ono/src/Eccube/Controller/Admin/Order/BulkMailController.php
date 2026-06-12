<?php

namespace Eccube\Controller\Admin\Order;

use Eccube\Controller\AbstractController;
use Eccube\Entity\Shipping;
use Eccube\Entity\MailHistory;
use Eccube\Form\Type\Admin\OrderMailType;
use Eccube\Service\MailService;
use Eccube\Repository\MailHistoryRepository;
use Eccube\Repository\OrderRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BulkMailController extends AbstractController
{
    /**
     * @var MailService
     */
    protected $mailService;

    /**
     * @var MailHistoryRepository
     */
    protected $mailHistoryRepository;

    /**
     * @var OrderRepository
     */
    protected $orderRepository;

    public function __construct(
        MailService $mailService,
        MailHistoryRepository $mailHistoryRepository,
        OrderRepository $orderRepository
    ) {
        $this->mailService = $mailService;
        $this->mailHistoryRepository = $mailHistoryRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * @Route("/%eccube_admin_route%/order/bulk_mail", name="admin_order_bulk_mail", methods={"GET", "POST"})
     * @Template("@admin/Order/bulk_mail.twig")
     */
    public function index(Request $request)
    {
        $session = $request->getSession();

        // 受け取ったShipping IDを取得
        $shippingIds = $request->get('ids', []);

        if (!empty($shippingIds)) {
            // Shipping IDを基にShippingエンティティを取得
            $shippings = $this->getDoctrine()
                ->getRepository(Shipping::class)
                ->findBy(['id' => $shippingIds]);

            // Shippingから関連するOrder情報を取得
            $orders = [];
            foreach ($shippings as $shipping) {
                $orders[] = $shipping->getOrder();
            }

            // セッションに保存
            $session->set('bulk_mail_orders', $orders);
        } else {
            // セッションから取得
            $orders = $session->get('bulk_mail_orders', []);
        }

        // フォーム作成
        $builder = $this->formFactory->createBuilder(OrderMailType::class);
        $form = $builder->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            $mode = $request->get('mode');

            switch ($mode) {
                case 'change':
                    if ($form->get('template')->isValid()) {
                        $MailTemplate = $form->get('template')->getData();

                        if ($MailTemplate) {
                            $twig = $MailTemplate->getFileName() ?: 'Mail/order.twig';

                            // プレビュー用に最初のOrderを使用
                            $previewOrder = $orders[0] ?? null;
                            if ($previewOrder) {
                                // Orderエンティティを明示的に再取得
                                $previewOrder = $this->orderRepository->find($previewOrder->getId());
                                
                                // メール本文を生成
                                $body = $this->createBody([$previewOrder], $twig);

                                // フォームを再作成してデータを更新
                                $builder = $this->formFactory->createBuilder(OrderMailType::class);
                                $form = $builder->getForm();

                                $form->get('template')->setData($MailTemplate);
                                $form->get('mail_subject')->setData($MailTemplate->getMailSubject());
                                $form->get('tpl_data')->setData($body);
                            }
                        }
                    }
                    break;

                case 'confirm':
                    if ($form->isSubmitted() && $form->isValid()) {
                        $builder->setAttribute('freeze', true);
                        $builder->setAttribute('freeze_display_text', false);
                        $form = $builder->getForm();
                        $form->handleRequest($request);

                        return $this->render('@admin/Order/bulk_mail_confirm.twig', [
                            'form' => $form->createView(),
                            'orders' => $orders,
                        ]);
                    }
                    break;

                case 'complete':
                    if ($form->isSubmitted() && $form->isValid()) {
                        $data = $form->getData();
                        // テンプレートファイル名を取得
                        $MailTemplate = $form->get('template')->getData();
                        $twig = $MailTemplate ? $MailTemplate->getFileName() : 'Mail/order.twig';

                        // 成功・失敗のリストを初期化
                        $successfulOrders = [];
                        $failedOrders = [];

                        foreach ($orders as $Order) {
                            try {
                                // Orderエンティティをリフレッシュ
                                $Order = $this->orderRepository->find($Order->getId());

                                // 各注文に対して個別にメール本文を生成
                                $body = $this->renderView($twig, [
                                    'Order' => $Order,
                                ]);
                                
                                // メール送信データを準備
                                $sendData = [
                                    'mail_subject' => $data['mail_subject'],
                                    'tpl_data' => $body,
                                    'Order' => $Order,
                                ];

                                // メール送信
                                $message = $this->mailService->sendAdminOrderMail($Order, $sendData);

                                // メール履歴を保存
                                $MailHistory = new MailHistory();
                                $MailHistory
                                    ->setMailSubject($message->getSubject())
                                    ->setMailBody($message->getTextBody())
                                    ->setSendDate(new \DateTime())
                                    ->setOrder($Order);

                                $this->entityManager->persist($MailHistory);
                                
                                // 成功した場合のリストに追加
                                $successfulOrders[] = $Order->getId();
                            } catch (\Exception $e) {
                                // エラー発生時の処理
                                $failedOrders[] = $Order->getId();
                                $this->addFlash('error', sprintf(
                                    'Order ID %s のメール送信中にエラーが発生しました: %s',
                                    $Order->getId(),
                                    $e->getMessage()
                                ));
                            }
                        }

                        // 全ての変更をデータベースに反映
                        $this->entityManager->flush();

                        // 結果メッセージを表示
                        if (!empty($successfulOrders)) {
                            $this->addSuccess(
                                sprintf(
                                    'メール送信が完了しました（成功: %d 件、失敗: %d 件）。',
                                    count($successfulOrders),
                                    count($failedOrders)
                                ),
                                'admin'
                            );
                        }

                        // 完了後にリダイレクト
                        return $this->redirectToRoute('admin_order_bulk_mail');
                    }
                    break;


                default:
                    break;
            }
        }

        return [
            'form' => $form->createView(),
            'orders' => $orders,
        ];
    }

    private function createBody(array $orders, $twig = 'Mail/order.twig')
    {
        // 最初の注文を使用してメールテンプレートをレンダリング
        $Order = $orders[0] ?? null;
        if ($Order) {
            // Orderエンティティを関連エンティティと共に取得
            $Order = $this->orderRepository->findOneBy(
                ['id' => $Order->getId()]
            );

            // 関連エンティティを事前に読み込み
            if ($Order) {
                // 関連エンティティを明示的に読み込む
                $Order->getShippings()->toArray();
                $Order->getOrderItems()->toArray();
                
                // EntityManagerに再度関連付け
                $this->entityManager->refresh($Order);
            }
        }
        
        return $this->renderView($twig, [
            'Order' => $Order,
        ]);
    }
}
