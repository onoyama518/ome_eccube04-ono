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

namespace Customize\Controller;

use Eccube\Controller\ForgotController as BaseForgotController;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Eccube\Form\Type\Front\ForgotType;
use Eccube\Form\Type\Front\PasswordResetType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception as HttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Customize\Util\RecaptchaUtil;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ForgotController extends BaseForgotController
{
    /**
     * パスワードリマインダ.
     *
     * @Route("/forgot", name="forgot", methods={"GET", "POST"}, priority=1)
     * @Template("Forgot/index.twig")
     */
    public function index(Request $request)
    {
        log_info('[DEBUG] カスタマイズ版ForgotController::index が呼び出されました');
        
        if ($this->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw new HttpException\NotFoundHttpException();
        }

        $builder = $this->formFactory
            ->createNamedBuilder('', ForgotType::class);

        // reCAPTCHAフィールドの追加
        $builder->add('recaptchaResponse', HiddenType::class, [
            'mapped' => false,
            'required' => false,
        ]);

        $event = new EventArgs(
            [
                'builder' => $builder,
            ],
            $request
        );
        $this->eventDispatcher->dispatch($event, EccubeEvents::FRONT_FORGOT_INDEX_INITIALIZE);

        $form = $builder->getForm();
        $form->handleRequest($request);

        log_info('[DEBUG] フォーム送信状態', [
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
                log_error('[DEBUG] フォームバリデーションエラー', ['errors' => $errors]);
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            log_info('パスワード再発行(メール送信)開始');

            $recaptchaToken = $request->get(RecaptchaUtil::INPUT_NAME);
            log_info('[reCAPTCHA] 受信トークン', [
                'token_exists' => !empty($recaptchaToken),
                'token_length' => $recaptchaToken ? strlen($recaptchaToken) : 0,
            ]);

            if (false === RecaptchaUtil::check($recaptchaToken)) {
                log_error('[reCAPTCHA] 検証失敗');
                $this->addError('セキュリティ確認に失敗しました。もう一度入力してください。');
                return $this->redirectToRoute('forgot');
            }

            log_info('[reCAPTCHA] 検証成功');

            $Customer = $this->customerRepository
                ->getRegularCustomerByEmail($form->get('login_email')->getData());

            if (!is_null($Customer)) {
                // リセットキーの発行・有効期限の設定
                $Customer
                    ->setResetKey($this->customerRepository->getUniqueResetKey())
                    ->setResetExpire(new \DateTime('+'.$this->eccubeConfig['eccube_customer_reset_expire'].' min'));

                // リセットキーを更新
                $this->entityManager->persist($Customer);
                $this->entityManager->flush();

                $event = new EventArgs(
                    [
                        'form' => $form,
                        'Customer' => $Customer,
                    ],
                    $request
                );
                $this->eventDispatcher->dispatch($event, EccubeEvents::FRONT_FORGOT_INDEX_COMPLETE);

                // 完了URLの生成
                $reset_url = $this->generateUrl('forgot_reset', ['reset_key' => $Customer->getResetKey()], UrlGeneratorInterface::ABSOLUTE_URL);

                // メール送信
                $this->mailService->sendPasswordResetNotificationMail($Customer, $reset_url);

                // ログ出力
                log_info('send reset password mail to:'."{$Customer->getId()} {$Customer->getEmail()} {$request->getClientIp()}");
            } else {
                log_warning(
                    'Un active customer try send reset password email: ',
                    ['Enter email' => $form->get('login_email')->getData()]
                );
            }

            return $this->redirectToRoute('forgot_complete');
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * パスワード再発行実行画面.
     *
     * @Route("/forgot/reset/{reset_key}", name="forgot_reset", methods={"GET", "POST"}, priority=1)
     * @Template("Forgot/reset.twig")
     */
    public function reset(Request $request, $reset_key)
    {
        if ($this->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw new HttpException\NotFoundHttpException();
        }

        $errors = $this->validator->validate(
            $reset_key,
            [
                new Assert\NotBlank(),
                new Assert\Regex(
                    [
                        'pattern' => '/^[a-zA-Z0-9]+$/',
                    ]
                ),
            ]
        );

        if (count($errors) > 0) {
            // リセットキーに異常がある場合
            throw new HttpException\NotFoundHttpException();
        }

        $Customer = $this->customerRepository
            ->getRegularCustomerByResetKey($reset_key);

        if (null === $Customer) {
            // リセットキーから会員データが取得できない場合
            throw new HttpException\NotFoundHttpException();
        }

        $builder = $this->formFactory
            ->createNamedBuilder('', PasswordResetType::class);

        // reCAPTCHAフィールドの追加
        $builder->add('recaptchaResponse', HiddenType::class, [
            'mapped' => false,
            'required' => false,
        ]);

        $form = $builder->getForm();
        $form->handleRequest($request);
        $error = null;

        log_info('[DEBUG] パスワード再設定フォーム送信状態', [
            'isSubmitted' => $form->isSubmitted(),
            'errors' => $form->getErrors(true)->count()
        ]);

        // フォームが送信された場合のみバリデーションを実行
        if ($form->isSubmitted()) {
            log_info('[DEBUG] パスワード再設定フォームが送信されました - バリデーション状態', [
                'isValid' => $form->isValid()
            ]);

            // バリデーションエラーの詳細を出力
            if (!$form->isValid()) {
                $errors = [];
                foreach ($form->getErrors(true) as $error) {
                    $errors[] = $error->getMessage();
                }
                log_error('[DEBUG] パスワード再設定フォームバリデーションエラー', ['errors' => $errors]);
            }
        }

        if ($form->isSubmitted() && $form->isValid()) {
            log_info('パスワード再発行(再設定)開始');

            $recaptchaToken = $request->get(RecaptchaUtil::INPUT_NAME);
            log_info('[reCAPTCHA] 受信トークン', [
                'token_exists' => !empty($recaptchaToken),
                'token_length' => $recaptchaToken ? strlen($recaptchaToken) : 0,
            ]);

            if (false === RecaptchaUtil::check($recaptchaToken)) {
                log_error('[reCAPTCHA] 検証失敗');
                $this->addError('セキュリティ確認に失敗しました。もう一度入力してください。');
                return [
                    'error' => $error,
                    'form' => $form->createView(),
                ];
            }

            log_info('[reCAPTCHA] 検証成功');

            // リセットキー・入力メールアドレスで会員情報検索
            $Customer = $this->customerRepository
                ->getRegularCustomerByResetKey($reset_key, $form->get('login_email')->getData());
            if ($Customer) {
                // パスワードの発行・更新
                $encoder = $this->encoderFactory->getEncoder($Customer);
                $pass = $form->get('password')->getData();
                $Customer->setPassword($pass);

                // 発行したパスワードの暗号化
                if ($Customer->getSalt() === null) {
                    $Customer->setSalt($this->encoderFactory->getEncoder($Customer)->createSalt());
                }
                $encPass = $encoder->encodePassword($pass, $Customer->getSalt());

                // パスワードを更新
                $Customer->setPassword($encPass);
                // リセットキーをクリア
                $Customer->setResetKey(null);

                // パスワードを更新
                $this->entityManager->persist($Customer);
                $this->entityManager->flush();

                $event = new EventArgs(
                    [
                        'Customer' => $Customer,
                    ],
                    $request
                );
                $this->eventDispatcher->dispatch($event, EccubeEvents::FRONT_FORGOT_RESET_COMPLETE);

                // 完了メッセージを設定
                $this->addFlash('password_reset_complete', trans('front.forgot.reset_complete'));

                // ログインページへリダイレクト
                return $this->redirectToRoute('mypage_login');
            } else {
                // リセットキー・メールアドレスから会員データが取得できない場合
                $error = trans('front.forgot.reset_not_found');
            }
        }

        return [
            'error' => $error,
            'form' => $form->createView(),
        ];
    }
}