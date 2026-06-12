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

namespace Plugin\FAX42\Form\Extension\Fax;

use Eccube\Common\EccubeConfig;
use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Eccube\Form\Type\ShippingMultipleItemType;
use Eccube\Repository\Master\PrefRepository;
use Eccube\Service\OrderHelper;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class ShippingMultipleItemTypeExtension extends AbstractTypeExtension
{
    /**
     * @var EccubeConfig
     */
    private $eccubeConfig;

    /**
     * @var AuthorizationCheckerInterface
     */
    private $authorizationChecker;

    /**
     * @var OrderHelper
     */
    private $orderHelper;

    /**
     * @var PrefRepository
     */
    private $prefRepository;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * ShopMasterPointExtension constructor.
     */
    public function __construct(
        EccubeConfig $eccubeConfig,
        AuthorizationCheckerInterface $authorizationChecker,
        OrderHelper $orderHelper,
        PrefRepository $prefRepository,
        TokenStorageInterface $tokenStorage,
        RequestStack $requestStack
    ) {
        $this->eccubeConfig = $eccubeConfig;
        $this->authorizationChecker = $authorizationChecker;
        $this->orderHelper = $orderHelper;
        $this->prefRepository = $prefRepository;
        $this->session = $requestStack->getCurrentRequest()->getSession();
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * ShopMasterPointExtension.
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $form = $event->getForm();

            if ($this->authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
                // 会員の場合は、会員住所とお届け先住所をマージしてリストを作成
                /** @var Customer $Customer */
                $Customer = $this->tokenStorage->getToken()->getUser();
                $CustomerAddress = new CustomerAddress();
                $CustomerAddress->setFromCustomer($Customer);
                $CustomerAddress->setFax($Customer->getFax());
                $CustomerAddresses = array_merge([$CustomerAddress], $Customer->getCustomerAddresses()->toArray());
            } else {
                $CustomerAddresses = [];
                // 非会員の場合は、セッションに保持されている注文者住所とお届け先住所をマージしてリストを作成
                if ($NonMember = $this->orderHelper->getNonMember('eccube.front.shopping.nonmember')) {
                    $sessionData = $this->session->get(OrderHelper::SESSION_NON_MEMBER);
                    $CustomerAddress = new CustomerAddress();
                    $CustomerAddress->setFromCustomer($NonMember);

                    if (isset($sessionData['fax'])) {
                        $CustomerAddress->setFax($sessionData['fax']);
                    }

                    if ($CustomerAddresses = $this->session->get('eccube.front.shopping.nonmember.customeraddress')) {
                        $CustomerAddresses = unserialize($CustomerAddresses);
                        $CustomerAddresses = array_merge([$CustomerAddress], $CustomerAddresses);
                        foreach ($CustomerAddresses as $Address) {
                            $Pref = $this->prefRepository->find($Address->getPref()->getId());
                            $Address->setPref($Pref);
                        }
                    }
                }
            }

            $form->add('customer_address', ChoiceType::class, [
                'choices' => $CustomerAddresses,
                'choice_label' => 'shippingMultipleDefaultName',
                'constraints' => [
                    new NotBlank(),
                ],
            ]);
        }, -10);
    }

    public function getExtendedType()
    {
        return ShippingMultipleItemType::class;
    }

    /**
     * @return string[]
     */
    public static function getExtendedTypes(): iterable
    {
        return [ShippingMultipleItemType::class];
    }
}
