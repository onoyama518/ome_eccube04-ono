<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright (c) 2006 PAYGENT Co.,Ltd. All rights reserved.
 *
 * https://www.paygent.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace Plugin\PaygentPayment42\Form\Type;

use Plugin\PaygentPayment42\Repository\ConfigRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Constraints as Assert;
use Eccube\Common\EccubeConfig;
use Plugin\PaygentPayment42\Service\Conveni\ConveniTypeF;

class ConveniPaymentType extends AbstractType
{
    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    public function __construct(
        EccubeConfig $eccubeConfig,
        ConfigRepository $configRepository,
        ConveniTypeF $conveniTypeF

    ) {
        $this->eccubeConfig = $eccubeConfig;
        $this->configRepository = $configRepository;
        $this->conveniTypeF = $conveniTypeF;
    }

    /**
     * Build result conveni type form
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // プラグイン設定情報の取得
        $config = $this->configRepository->get();

        // 接続タイプで選択肢を分岐
        if ($config->getConveniConnectType() === $this->eccubeConfig['paygent_payment']['cvs_connect_type']['f']) {
            $arrConveni = $this->conveniTypeF->getConvenienceTypeChoices();
        } else {
            $arrConveni = [$this->eccubeConfig['paygent_payment']['cvs_form_non_select'] => ''];
            foreach ($this->eccubeConfig['paygent_payment']['cvs_company_id'] as $conveniName => $conveniId) {
                $arrConveni[$this->eccubeConfig['paygent_payment']['cvs_company_name'][$conveniName]] = $conveniId;
            }
        }

        $builder
                ->add('cvs_company_id', ChoiceType::class, [
                        'required' => false,
                        'choices' => $arrConveni,
                        'data' => '',
                        'constraints' => [
                            new Assert\NotBlank(['message' => '※ コンビニが入力されていません。']),
                        ],
                ])
                ;
    }
}
