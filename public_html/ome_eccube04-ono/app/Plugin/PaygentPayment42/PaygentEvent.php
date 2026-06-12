<?php

namespace Plugin\PaygentPayment42;

use Eccube\Common\Constant;
use Eccube\Event\EventArgs;
use Eccube\Event\EccubeEvents;
use Eccube\Event\TemplateEvent;
use Eccube\Common\EccubeConfig;
use Plugin\PaygentPayment42\Repository\ConfigRepository;
use Plugin\PaygentPayment42\Service\PaymentAdminFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Csrf\CsrfToken;

class PaygentEvent implements EventSubscriberInterface
{
    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * @var ConfigRepository
     */
    protected $configRepository;

    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * @var PaymentAdminFactory
     */
    protected $paymentAdminFactory;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * PaygentEvent
     *
     * @param eccubeConfig $eccubeConfig
     * @param ConfigRepository $configRepository
     * @param SessionInterface $session
     * @param PaymentAdminFactory $paymentAdminFactory
     * @param ContainerInterface $container
     */
    public function __construct(
        EccubeConfig $eccubeConfig,
        ConfigRepository $configRepository,
        SessionInterface $session,
        PaymentAdminFactory $paymentAdminFactory,
        ContainerInterface $container
    ) {
        $this->eccubeConfig = $eccubeConfig;
        $this->configRepository = $configRepository;
        $this->session = $session;
        $this->paymentAdminFactory = $paymentAdminFactory;
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Shopping/index.twig' => 'index',
            'Shopping/confirm.twig' => 'confirm',
            '@admin/Order/edit.twig' => 'onAdminOrderEditTwig',
            EccubeEvents::ADMIN_ORDER_EDIT_INDEX_INITIALIZE => 'onAdminOrderEditIndexInitialize',
            'Shopping/complete.twig' => 'complete'
        ];
    }

    public function index(TemplateEvent $event)
    {
        $payment = $event->getParameter('Order')->getPayment();
        $paymentMethod = $payment->getMethodClass();

        // リンク型クレジットカードが選択されている時のみ処理
        if (preg_match('/^Plugin\\\PaygentPayment42\\\Service\\\Method\\\Credit/', $paymentMethod)) {

            $parameters = $event->getParameters();
            $parameters['paygent_credit_payment_id'] = $payment->getId();

            $event->setParameters($parameters);
            $event->addSnippet('@PaygentPayment42/default/Shopping/select_payment.twig');
        }
    }

    public function confirm(TemplateEvent $event)
    {
        $paymentMethod = $event->getParameter('Order')->getPayment()->getMethodClass();

        if (preg_match('/^Plugin\\\PaygentPayment42\\\Service\\\Method/', $paymentMethod)) {
            $event->addSnippet('@PaygentPayment42/default/Shopping/confirm_button.twig');
        }
    }

    public function onAdminOrderEditTwig(TemplateEvent $event)
    {
        $parameters = $event->getParameters();
        $order = $parameters['Order'];

        $paymentInstance = $this->paymentAdminFactory->getInstance($order->getPaygentPaymentMethod());

        if ($paymentInstance) {
            $methodName = $paymentInstance->getPaymentMethodName($order->getPaygentPaymentMethod());

            if ($methodName) {
                $event->addSnippet('@PaygentPayment42/admin/Order/payment_order_edit.twig');
    
                $parameters = $event->getParameters();
                $parameters['paygentMethodName'] = $methodName;
                $parameters['paygentStatusName'] = $paymentInstance->getPaymentStatusName($order->getPaygentKind());
                $parameters['paygentError'] = $order->getPaygentError();
                $parameters['paygentFlags'] = $paymentInstance->getPaygentFlags($order);

                if ($this->session->get('paygent_payment.order_edit_on_click_payment_button')) {
                    $parameters['paygentOnClickButton'] = true;
                }

                $message = $this->session->get('paygent_payment.order_edit_message');
    
                if (isset($message)) {
                    $parameters['paygentMessage'] = $message;
                    $this->session->remove('paygent_payment.order_edit_message');
                }
    
                $event->setParameters($parameters);
            }
        }
        $this->session->remove('paygent_payment.order_edit_on_click_payment_button');
    }

    public function onAdminOrderEditIndexInitialize(EventArgs $event)
    {
        $request = $event->getRequest();
        $paygentType = $request->get('paygentType');

        if ($request->getMethod() === 'POST' && $paygentType) {
            $this->checkToken();

            $this->session->set('paygent_payment.order_edit_on_click_payment_button', true);

            $order = $event->getArgument('TargetOrder');

            $paymentInstance = $this->paymentAdminFactory->getInstance($order->getPaygentPaymentMethod());
            $paygentFlags = $paymentInstance->getPaygentFlags($order);

            // $paygentTypeのチェック
            if ($this->checkPaymentType($paygentFlags, $paygentType)) {
                // 通信処理
                $res = $paymentInstance->process($paygentType, $order->getId());
        
                if ($res) {
                    // 結果出力
                    if ($res['return'] === true) {
                        $message = $res['type'] . "に成功しました。";
                    } elseif (isset($res['response']) && $res['response'] != "") {
                        $message = $res['type'] . "に失敗しました。" . $res['response'];
                    } else {
                        $message = $res['type'] . "に失敗しました。";
                    }
                    $this->session->set('paygent_payment.order_edit_message', $message);
                }
            }
        }
    }

    private function checkPaymentType($paygentFlags, $paygentType)
    {
        if ((isset($paygentFlags['commit']) && $paygentFlags['commit'] == $paygentType)
            || (isset($paygentFlags['change']) && $paygentFlags['change'] == $paygentType)
            || (isset($paygentFlags['change_auth']) && $paygentFlags['change_auth'] == $paygentType)
            || (isset($paygentFlags['cancel']) && $paygentFlags['cancel'] == $paygentType))
        {
            return true;
        }
        // 差分通知などでステータスが変わっている場合falseになる
        // 例 複数タブで受注編集画面を表示、売上処理を行った後に別タブで売上ボタンを押した場合falseになる
        return false;
    }

    public function complete(TemplateEvent $event)
    {
        $paymentMethod = $event->getParameter('Order')->getPayment()->getMethodClass();
        $paygentPaymentMethod = $event->getParameter('Order')->getPaygentPaymentMethod();

        // Paidyかつ0円決済フロー（ペイジェント決済画面を経由しないフロー）の場合は既存決済完了文を除去
        if (preg_match('/^Plugin\\\PaygentPayment42\\\Service\\\Method\\\Module\\\Paidy/', $paymentMethod) && $paygentPaymentMethod) {
            $event->addSnippet('@PaygentPayment42/default/Shopping/remove_complete_message.twig');
        }
    }

    private function checkToken()
    {
        /** @var Request $request */
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $order = $request->get('order');

        if (!$this->isCsrfTokenValid('order', $order[Constant::TOKEN_NAME])) {
            throw new AccessDeniedHttpException('CSRF token is invalid.');
        }

        return true;
    }

    /**
     * @see Symfony\Bundle\FrameworkBundle\Controller\AbstractController
     */
    private function isCsrfTokenValid(string $tokenId, ?string $tokenValue): bool
    {
        if (!$this->container->has('security.csrf.token_manager')) {
            throw new \LogicException('CSRF protection is not enabled in your application. Enable it with the "csrf_protection" key in "config/packages/framework.yaml".');
        }

        return $this->container->get('security.csrf.token_manager')->isTokenValid(new CsrfToken($tokenId, $tokenValue));
    }
}
