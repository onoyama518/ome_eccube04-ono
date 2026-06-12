<?php

namespace Customize\EventListener;

use Customize\Util\RecaptchaUtil;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RecaptchaLoginListener implements EventSubscriberInterface
{
    private $requestStack;
    private $urlGenerator;

    public function __construct(RequestStack $requestStack, UrlGeneratorInterface $urlGenerator)
    {
        $this->requestStack = $requestStack;
        $this->urlGenerator = $urlGenerator;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 8], // セキュリティより前に実行
        ];
    }

    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();
        
        // デバッグ: 全てのリクエストをログ出力
        log_info('[RecaptchaLoginListener] リクエスト処理開始', [
            'method' => $request->getMethod(),
            'path' => $request->getPathInfo(),
            'route' => $request->attributes->get('_route')
        ]);
        
        // ログインページのPOSTリクエストでない場合は検証をスキップ
        if (!$request->isMethod('POST') || $request->getPathInfo() !== '/mypage/login') {
            return;
        }

        // reCAPTCHAトークンを取得
        $recaptchaResponse = $request->request->get(RecaptchaUtil::INPUT_NAME);

        log_info('[RecaptchaLoginListener] ログイン時のreCAPTCHA検証開始', [
            'has_token' => !empty($recaptchaResponse)
        ]);

        // reCAPTCHAの検証
        if (!RecaptchaUtil::check($recaptchaResponse)) {
            log_warning('[RecaptchaLoginListener] reCAPTCHA検証失敗');
            
            // セッションにエラーメッセージを設定
            $request->getSession()->getFlashBag()->add(
                'eccube.front.error',
                'セキュリティ確認に失敗しました。お手数ですが、ページを更新してもう一度ご入力ください。'
            );

            // ログインページにリダイレクト
            $url = $this->urlGenerator->generate('mypage_login');
            $response = new RedirectResponse($url);
            $event->setResponse($response);
            
            return;
        }

        log_info('[RecaptchaLoginListener] reCAPTCHA検証成功');
    }
}