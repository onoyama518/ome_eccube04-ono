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

namespace Eccube\Form\Type;

use Eccube\Common\EccubeConfig;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class KanaType extends AbstractType
{
    /**
     * @var \Eccube\Common\EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * KanaType constructor.
     *
     * @param EccubeConfig $eccubeConfig
     */
    public function __construct(EccubeConfig $eccubeConfig)
    {
        $this->eccubeConfig = $eccubeConfig;
    }
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return NameType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // ひらがなをカタカナに変換する
        // 引数はmb_convert_kanaのもの
        $builder->addEventSubscriber(new \Eccube\Form\EventListener\ConvertKanaListener('CV'));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'lastname_options' => [
                'attr' => [
                    'placeholder' => 'common.last_name_kana',
                ],
                'constraints' => [
                    // 2. 文字種・形式の厳格チェック: 名前（カナ）全角カタカナのみ
                    new Assert\Regex([
                        'pattern' => '/^[ア-ヶー]+$/u',
                        'message' => '全角カタカナで入力してください。',
                    ]),
                    // 不正文字・禁止語・URL・スクリプトタグの入力制限
                    new Assert\Regex([
                        'pattern' => '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/',
                        'message' => '不正な文字が含まれています。',
                        'match' => false,
                    ]),
                    new Assert\Regex([
                        'pattern' => '/\s*<iframe|iframe|\s*<object|object|\s*<embed|embed|<script|script|javascript:|vbscript:|onload=|onclick=|eval\(|document\.|window\./i',
                        'message' => '不正なHTMLタグまたはスクリプトが含まれています。',
                        'match' => false,
                    ]),
                    new Assert\Length(['min' => 1, 'max' => 50]),
                    new Assert\NotBlank([
                        'message' => 'お名前（セイ）が入力されていません。',
                    ]),
                ],
            ],
            'firstname_options' => [
                'attr' => [
                    'placeholder' => 'common.first_name_kana',
                ],
                'constraints' => [
                    // 2. 文字種・形式の厳格チェック: 名前（カナ）全角カタカナのみ
                    new Assert\Regex([
                        'pattern' => '/^[ア-ヶー]+$/u',
                        'message' => '全角カタカナで入力してください。',
                    ]),
                    // 不正文字・禁止語・URL・スクリプトタグの入力制限
                    new Assert\Regex([
                        'pattern' => '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/',
                        'message' => '不正な文字が含まれています。',
                        'match' => false,
                    ]),
                    new Assert\Regex([
                        'pattern' => '/\s*<iframe|iframe|\s*<object|object|\s*<embed|embed|<script|script|javascript:|vbscript:|onload=|onclick=|eval\(|document\.|window\./i',
                        'message' => '不正なHTMLタグまたはスクリプトが含まれています。',
                        'match' => false,
                    ]),
                    
                    // 1. 文字数・桁数制限の厳格化: 名前（カナ）各1-50文字
                    new Assert\Length(['min' => 1, 'max' => 50]),
                    new Assert\NotBlank([
                        'message' => 'お名前（メイ）が入力されていません。',
                    ]),
                ],
            ],
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kana';
    }
}
