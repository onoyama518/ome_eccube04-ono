<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eccube\Controller\Mypage;

use Eccube\Controller\AbstractController;
use Eccube\Entity\Master\CustomerStatus;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Eccube\Repository\Master\CustomerStatusRepository;
use Eccube\Repository\PageRepository;
use Eccube\Service\CartService;
use Eccube\Service\MailService;
use Eccube\Service\OrderHelper;
use Eccube\Util\StringUtil;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class WithdrawController extends AbstractController
{
    /**
     * @var MailService
     */
    protected $mailService;

    /**
     * @var CustomerStatusRepository
     */
    protected $customerStatusRepository;

    /**
     * @var TokenStorage
     */
    protected $tokenStorage;

    /**
     * @var CartService
     */
    private $cartService;

    /**
     * @var OrderHelper
     */
    private $orderHelper;

    /**
     * @var PageRepository
     */
    private $pageRepository;

    /**
     * WithdrawController constructor.
     *
     * @param MailService $mailService
     * @param CustomerStatusRepository $customerStatusRepository
     * @param TokenStorageInterface $tokenStorage
     * @param CartService $cartService
     * @param OrderHelper $orderHelper
     * @param PageRepository $pageRepository
     */
    public function __construct(
        MailService $mailService,
        CustomerStatusRepository $customerStatusRepository,
        TokenStorageInterface $tokenStorage,
        CartService $cartService,
        OrderHelper $orderHelper,
        PageRepository $pageRepository
    ) {
        $this->mailService = $mailService;
        $this->customerStatusRepository = $customerStatusRepository;
        $this->tokenStorage = $tokenStorage;
        $this->cartService = $cartService;
        $this->orderHelper = $orderHelper;
        $this->pageRepository = $pageRepository;
    }

    /**
     * 退会画面.
     *
     * @Route("/mypage/withdraw", name="mypage_withdraw", methods={"GET", "POST"})
     * @Route("/mypage/withdraw", name="mypage_withdraw_confirm", methods={"GET", "POST"})
     * @Template("Mypage/withdraw.twig")
     */
    public function index(Request $request)
    {
        $builder = $this->formFactory->createBuilder();

        $event = new EventArgs(
            [
                'builder' => $builder,
            ],
            $request
        );
        $this->eventDispatcher->dispatch($event, EccubeEvents::FRONT_MYPAGE_WITHDRAW_INDEX_INITIALIZE);

        $form = $builder->getForm();

        $form->handleRequest($request);

        log_info('[WithdrawController] リクエストメソッド: ' . $request->getMethod());
        log_info('[WithdrawController] フォーム送信状況: ' . ($form->isSubmitted() ? 'true' : 'false'));
        
        if ($form->isSubmitted()) {
            log_info('[WithdrawController] フォーム検証状況: ' . ($form->isValid() ? 'true' : 'false'));
            
            if ($form->getErrors(true)->count() > 0) {
                foreach ($form->getErrors(true) as $error) {
                    log_warning('[WithdrawController] フォームエラー: ' . $error->getMessage());
                }
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            log_info('[WithdrawController] フォーム送信検証成功');
            
            // reCAPTCHA検証
            $recaptchaResponse = $request->request->get(\Customize\Util\RecaptchaUtil::INPUT_NAME);
            if (!\Customize\Util\RecaptchaUtil::check($recaptchaResponse)) {
                log_warning('[WithdrawController] 退会手続きでreCAPTCHA検証失敗');
                $this->addFlash('eccube.front.error', 'セキュリティ確認に失敗しました。お手数ですが、ページを更新してもう一度ご入力ください。');
                
                return [
                    'form' => $form->createView(),
                ];
            }

            log_info('[WithdrawController] reCAPTCHA検証成功');
            $mode = $request->get('mode');
            log_info('[WithdrawController] モード: ' . ($mode ?? 'null'));

            switch ($mode) {
                case 'confirm':
                    log_info('退会確認画面表示');

                    return $this->render(
                        'Mypage/withdraw_confirm.twig',
                        [
                            'form' => $form->createView(),
                            'Page' => $this->pageRepository->getPageByRoute('mypage_withdraw_confirm'),
                        ]
                    );

                case 'complete':
                    log_info('退会処理開始');

                    /* @var $Customer \Eccube\Entity\Customer */
                    $Customer = $this->getUser();
                    $email = $Customer->getEmail();

                    // 退会ステータスに変更
                    $CustomerStatus = $this->customerStatusRepository->find(CustomerStatus::WITHDRAWING);
                    $Customer->setStatus($CustomerStatus);
                    $Customer->setEmail(StringUtil::random(60).'@dummy.dummy');

                    $this->entityManager->flush();

                    log_info('退会処理完了');

                    $event = new EventArgs(
                        [
                            'form' => $form,
                            'Customer' => $Customer,
                        ], $request
                    );
                    $this->eventDispatcher->dispatch($event, EccubeEvents::FRONT_MYPAGE_WITHDRAW_INDEX_COMPLETE);

                    // メール送信
                    $this->mailService->sendCustomerWithdrawMail($Customer, $email);

                    // カートと受注のセッションを削除
                    $this->cartService->clear();
                    $this->orderHelper->removeSession();

                    // ログアウト
                    $this->tokenStorage->setToken(null);

                    log_info('ログアウト完了');

                    return $this->redirect($this->generateUrl('mypage_withdraw_complete'));
            }
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * 退会完了画面.
     *
     * @Route("/mypage/withdraw_complete", name="mypage_withdraw_complete", methods={"GET"})
     * @Template("Mypage/withdraw_complete.twig")
     */
    public function complete(Request $request)
    {
        return [];
    }
}
