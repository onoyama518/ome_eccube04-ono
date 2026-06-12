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
use Eccube\Form\Type\Front\CustomerAddressType;
use Eccube\Form\Type\PhoneNumberType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

class CustomerAddressTypeExtension extends AbstractTypeExtension
{
    /**
     * @var EccubeConfig
     */
    private $eccubeConfig;

    /**
     * ShopMasterPointExtension constructor.
     */
    public function __construct(
        EccubeConfig $eccubeConfig
    ) {
        $this->eccubeConfig = $eccubeConfig;
    }

    /**
     * ShopMasterPointExtension.
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fax', PhoneNumberType::class, [
            'label' => 'common.fax',
            'required' => false,
            'eccube_form_options' => [
                'auto_render' => true,
                'style_class' => 'ec-telInput',
            ],
        ]);
    }

    public function getExtendedType()
    {
        return CustomerAddressType::class;
    }

    /**
     * @return string[]
     */
    public static function getExtendedTypes(): iterable
    {
        return [CustomerAddressType::class];
    }
}
