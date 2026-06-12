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

namespace Plugin\ProductReview42\Controller;

use Eccube\Controller\AbstractController;
use Eccube\Entity\Master\ProductStatus;
use Eccube\Entity\Product;
use Plugin\ProductReview42\Entity\ProductReview;
use Plugin\ProductReview42\Entity\ProductReviewStatus;
use Plugin\ProductReview42\Form\Type\ProductReviewType;
use Plugin\ProductReview42\Repository\ProductReviewRepository;
use Plugin\ProductReview42\Repository\ProductReviewStatusRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Customize\Util\RecaptchaUtil;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

/**
 * Class ProductReviewController front.
 */
class ProductReviewController extends AbstractController
{
    /**
     * @var ProductReviewStatusRepository
     */
    private $productReviewStatusRepository;

    /**
     * @var ProductReviewRepository
     */
    private $productReviewRepository;

    /**
     * ProductReviewController constructor.
     *
     * @param ProductReviewStatusRepository $productStatusRepository
     * @param ProductReviewRepository $productReviewRepository
     */
    public function __construct(
        ProductReviewStatusRepository $productStatusRepository,
        ProductReviewRepository $productReviewRepository
    ) {
        $this->productReviewStatusRepository = $productStatusRepository;
        $this->productReviewRepository = $productReviewRepository;
    }

    /**
     * @Route("/product_review/{id}/review", name="product_review_index", requirements={"id" = "\d+"})
     * @Route("/product_review/{id}/review", name="product_review_confirm", requirements={"id" = "\d+"})
     *
     * @param Request $request
     * @param Product $Product
     *
     * @return RedirectResponse|Response
     */
    public function index(Request $request, Product $Product)
    {
        log_info('[DEBUG] オリジナルProductReviewController::index が呼び出されました');
        
        if (!$this->session->has('_security_admin') && $Product->getStatus()->getId() !== ProductStatus::DISPLAY_SHOW) {
            log_info('Product review', ['status' => 'Not permission']);

            throw new NotFoundHttpException();
        }

        $ProductReview = new ProductReview();
        $form = $this->createForm(ProductReviewType::class, $ProductReview);
        
        // reCAPTCHAフィールドを動的に追加
        $form->add('recaptchaResponse', HiddenType::class, [
            'mapped' => false,
            'required' => false,
        ]);

        $form->handleRequest($request);
        
        log_info('[DEBUG] レビューフォーム送信状態', [
            'isSubmitted' => $form->isSubmitted(),
            'errors' => $form->getErrors(true)->count()
        ]);

        // フォームが送信された場合のみバリデーションを実行
        if ($form->isSubmitted()) {
            log_info('[DEBUG] フォームが送信されました - バリデーション状態', [
                'isValid' => $form->isValid()
            ]);

            // バリデーションエラーの詳細を出力
            if (!$form->isValid()) {
                $errors = [];
                foreach ($form->getErrors(true) as $error) {
                    $errors[] = $error->getMessage();
                }
                log_error('[DEBUG] レビューフォームバリデーションエラー', ['errors' => $errors]);
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var $ProductReview ProductReview */
            $ProductReview = $form->getData();

            $mode = $request->get('mode');
            log_info('[DEBUG] リクエストモード', ['mode' => $mode]);

            switch ($mode) {
                case 'confirm':
                    log_info('レビュー投稿(確認)開始');
                    
                    $recaptchaToken = $request->get(RecaptchaUtil::INPUT_NAME);
                    log_info('[reCAPTCHA] 受信トークン', [
                        'token_exists' => !empty($recaptchaToken),
                        'token_length' => $recaptchaToken ? strlen($recaptchaToken) : 0,
                    ]);

                    if (false === RecaptchaUtil::check($recaptchaToken)) {
                        log_error('[reCAPTCHA] 検証失敗');
                        $this->addError('セキュリティ確認に失敗しました。もう一度入力してください。');
                        return $this->render('ProductReview42/Resource/template/default/index.twig', [
                            'Product' => $Product,
                            'ProductReview' => $ProductReview,
                            'form' => $form->createView(),
                        ]);
                    }

                    log_info('[reCAPTCHA] 検証成功');
                    log_info('Product review config confirm');

                    return $this->render('ProductReview42/Resource/template/default/confirm.twig', [
                        'form' => $form->createView(),
                        'Product' => $Product,
                        'ProductReview' => $ProductReview,
                    ]);
                    break;

                case 'complete':
                    log_info('レビュー投稿(完了)開始 - reCAPTCHA検証済み');
                    log_info('Product review complete');
                    
                    if ($this->isGranted('ROLE_USER')) {
                        $Customer = $this->getUser();
                        $ProductReview->setCustomer($Customer);
                    }
                    $ProductReview->setProduct($Product);
                    $ProductReview->setStatus($this->productReviewStatusRepository->find(ProductReviewStatus::HIDE));
                    $this->entityManager->persist($ProductReview);
                    $this->entityManager->flush($ProductReview);

                    log_info('Product review complete', ['id' => $Product->getId()]);

                    return $this->redirectToRoute('product_review_complete', ['id' => $Product->getId()]);
                    break;

                case 'back':
                    // 確認画面から投稿画面へ戻る
                    break;

                default:
                    // do nothing
                    break;
            }
        }

        return $this->render('ProductReview42/Resource/template/default/index.twig', [
            'Product' => $Product,
            'ProductReview' => $ProductReview,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Complete.
     *
     * @Route("/product_review/{id}/complete", name="product_review_complete", requirements={"id" = "\d+"})
     * @Template("ProductReview42/Resource/template/default/complete.twig")
     *
     * @param $id
     *
     * @return array
     */
    public function complete($id)
    {
        return ['id' => $id];
    }

    /**
     * ページ管理表示用のダミールーティング.
     *
     * @Route("/product_review/display", name="product_review_display")
     */
    public function display()
    {
        return new Response();
    }
}
