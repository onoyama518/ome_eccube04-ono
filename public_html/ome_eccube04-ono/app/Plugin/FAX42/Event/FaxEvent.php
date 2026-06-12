<?php

/*
 * This file is part of FAX42
 * Copyright(c) U-Mebius Inc. All Rights Reserved.
 *
 * https://umebius.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\FAX42\Event;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Eccube\Entity\CustomerAddress;
use Eccube\Entity\Order;
use Eccube\Entity\Shipping;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Eccube\Event\TemplateEvent;
use Eccube\Form\Type\Shopping\CustomerAddressType;
use Eccube\Service\OrderHelper;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class FaxEvent implements EventSubscriberInterface
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var OrderHelper
     */
    private $orderHelper;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var SessionInterface
     */
    private $session;

    public function __construct(
        RequestStack $requestStack,
        TokenStorageInterface $tokenStorage,
        RouterInterface $router,
        OrderHelper $orderHelper,
        FormFactoryInterface $formFactory,
        EntityManagerInterface $entityManager
    ) {
        $this->tokenStorage = $tokenStorage;
        $this->requestStack = $requestStack;
        $this->router = $router;
        $this->orderHelper = $orderHelper;
        $this->formFactory = $formFactory;
        $this->entityManager = $entityManager;
        $this->session = $this->requestStack->getSession();
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            Events::prePersist => 'prePersist',
            EccubeEvents::FRONT_SHOPPING_SHIPPING_COMPLETE => 'onFrontShoppingShippingComplete',
            EccubeEvents::FRONT_SHOPPING_CUSTOMER_INITIALIZE => 'onFrontShoppingCustomizeInitialize',
            EccubeEvents::FRONT_SHOPPING_SHIPPING_EDIT_INITIALIZE => 'onFrontShoppingShippingEditInitialize',
            EccubeEvents::FRONT_SHOPPING_SHIPPING_EDIT_COMPLETE => 'onFrontShoppingShippingEditComplete',
            EccubeEvents::ADMIN_ORDER_EDIT_SEARCH_CUSTOMER_BY_ID_COMPLETE => 'onAdminOrderEditSearchCustomerByIdComplete',
            'Entry/index.twig' => ['onEntryIndexTwig'],
            'Entry/confirm.twig' => ['onEntryIndexTwig'],
            'Shopping/index.twig' => ['onShoppingIndexTwig'],
            'Shopping/confirm.twig' => ['onShoppingIndexTwig'],
            'Shopping/nonmember.twig' => ['onShoppingNonmemberTwig'],
            'Mypage/change.twig' => ['onEntryIndexTwig'],
            '@admin/Customer/edit.twig' => ['onAdminCustomerEditTwig'],
            '@admin/Order/edit.twig' => ['onAdminOrderEditTwig'],
            '@admin/Order/shipping.twig' => ['onAdminOrderShippingTwig'],
            '@admin/Order/search_customer.twig' => ['onAdminOrderSearchCustomerTwig'],
        ];
    }

    /**
     * 受注の初期生成時にFAX番号登録
     * @param LifecycleEventArgs $args
     * @return void
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $request = $this->requestStack->getCurrentRequest();
        if ($request->attributes->get('_route') === 'shopping') {
            $Customer = $this->tokenStorage->getToken() ? $this->tokenStorage->getToken()->getUser() : $this->orderHelper->getNonMember();
            if ($entity instanceof Order) {
                $entity->setFax($Customer->getFax());
            }

            if ($entity instanceof Shipping) {
                $entity->setFax($Customer->getFax());
            }
        }
    }

    public function onFrontShoppingShippingComplete(EventArgs $eccubeEvents)
    {
        // 本体がログインユーザーだけ使う機能
        $token = $this->tokenStorage->getToken();
        if (is_null($token)) {
            return;
        }

        $request = $eccubeEvents->getRequest();

        $Shipping = $eccubeEvents->getArgument('Shipping');
        $builder = $this->formFactory->createBuilder(CustomerAddressType::class, null, [
            'customer' => $token->getUser(),
            'shipping' => $Shipping,
        ]);

        $form = $builder->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var CustomerAddress $CustomerAddress */
            $CustomerAddress = $form['addresses']->getData();

            // お届け先情報を更新
            $Shipping->setFax($CustomerAddress->getFax());
            $this->entityManager->flush();
        }
    }

    public function onFrontShoppingCustomizeInitialize(EventArgs $eccubeEvents)
    {
        $data = $eccubeEvents->getArgument('data');
        $Order = $eccubeEvents->getArgument('Order');

        if (isset($data['customer_fax'])) {
            $Order->setFax($data['customer_fax']);
            $this->entityManager->flush();

            $saveData = $this->session->get(OrderHelper::SESSION_NON_MEMBER);
            $saveData['fax'] = $data['customer_fax'];
            $this->session->set(OrderHelper::SESSION_NON_MEMBER, $saveData);
        }
    }

    public function onFrontShoppingShippingEditInitialize(EventArgs $eccubeEvents)
    {
        $builder = $eccubeEvents->getArgument('builder');
        $Shipping = $eccubeEvents->getArgument('Shipping');
        $CustomerAddress = $eccubeEvents->getArgument('CustomerAddress');
        $CustomerAddress->setFax($Shipping->getFax());
    }

    public function onFrontShoppingShippingEditComplete(EventArgs $eccubeEvents)
    {
        $Shipping = $eccubeEvents->getArgument('Shipping');
        $CustomerAddress = $eccubeEvents->getArgument('CustomerAddress');
        $Shipping->setFax($CustomerAddress->getFax());
        $this->entityManager->flush();
    }

    public function onAdminOrderEditSearchCustomerByIdComplete(EventArgs $eccubeEvents)
    {
        $data = $eccubeEvents->getArgument('data');
        $Customer = $eccubeEvents->getArgument('Customer');
        $data['fax'] = $Customer->getFax();
        $eccubeEvents->setArgument('data', $data);
    }

    public function onEntryIndexTwig(TemplateEvent $event)
    {
        $event->addSnippet('@FAX42/common/common_script.twig');
        $event->addSnippet('<script>move_row_from_to("#entry_fax", "#entry_phone_number", "dl")</script>', false);
    }

    public function onShoppingIndexTwig(TemplateEvent $event)
    {
        $event->addSnippet('@FAX42/common/common_script.twig');
        $event->addSnippet('@FAX42/Shopping/index_fax.twig');
    }

    public function onShoppingNonmemberTwig(TemplateEvent $event)
    {
        $event->addSnippet('@FAX42/common/common_script.twig');
        $event->addSnippet('@FAX42/Shopping/nonmember_fax.twig');
    }

    public function onAdminCustomerEditTwig(TemplateEvent $event)
    {
        $event->addSnippet('@FAX42/common/common_script.twig');
        $event->addSnippet('<script>move_row_from_to("#admin_customer_fax", "#admin_customer_phone_number")</script>', false);
    }

    public function onAdminOrderEditTwig(TemplateEvent $event)
    {
        $event->addSnippet('@FAX42/common/common_script.twig');
        $event->addSnippet('<script>move_row_from_to("#order_fax", "#order_phone_number")</script>', false);
        $event->addSnippet('@FAX42/admin/Order/edit_fax.twig');
    }

    public function onAdminOrderShippingTwig(TemplateEvent $event)
    {
        $event->addSnippet('@FAX42/common/common_script.twig');
        $event->addSnippet('@FAX42/admin/Order/shipping_fax.twig');
    }

    public function onAdminOrderSearchCustomerTwig(TemplateEvent $event)
    {
        $source = $event->getSource();
        $search = "$('#order_phone_number').val(data['phone_number']);";
        $source = str_replace(
            $search,
            $search."$('#order_fax').val(data['fax']);",
            $source
        );
        $event->setSource($source);
    }
}
