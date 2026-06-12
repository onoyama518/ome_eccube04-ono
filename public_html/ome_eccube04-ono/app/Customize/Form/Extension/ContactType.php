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
 *
 */

// 部署名・サロン名のために追加
namespace Customize\Form\Extension;

use Eccube\Common\EccubeConfig;
use Eccube\Form\Type\AddressType;
use Eccube\Form\Type\KanaType;
use Eccube\Form\Type\NameType;
use Eccube\Form\Type\PhoneNumberType;
use Eccube\Form\Type\PostalType;
use Eccube\Form\Validator\Email;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

// 部署名・サロン名のために追加
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactType extends AbstractType
{
    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * ContactType constructor.
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
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // サロン名の追加
            ->add('company_name', TextType::class, [
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => '会社名またはサロン名が入力されていません。',
                    ]),
                    new Assert\Length(['min' => 1, 'max' => 100]),
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
                ],
            ])

            ->add('name', NameType::class, [
                'required' => true,

            ])

            ->add('kana', KanaType::class, [
                'required' => true,


            ])
            ->add('postal_code', PostalType::class, [
                'required' => false,

            ])
            ->add('address', AddressType::class, [
                'required' => false,

            ])
            ->add('phone_number', PhoneNumberType::class, [
                'required' => true,

            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'メールアドレスが入力されていません。',
                    ]),
                    new Assert\Length(['min' => 1, 'max' => 50]),
                    new Email(null, null, $this->eccubeConfig['eccube_rfc_email_check'] ? 'strict' : null),
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
                ],

            ])
            // お問い合わせ種別の追加
            ->add('contact_type', ChoiceType::class, [
                'required' => true,
                'placeholder' => '選択してください',
                'choices' => [
                    '商品について' => '商品について',
                    'ご注文について' => 'ご注文について',
                    'お支払い・配送について' => 'お支払い・配送について',
                    '返品・交換について' => '返品・交換について',
                    'OEMについて' => 'OEMについて',
                    'その他' => 'その他',
                ],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'お問い合わせ種別が選択されていません。',
                    ]),
                ],
            ])
            ->add('contents', TextareaType::class, [
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'お問い合わせ内容が入力されていません。',
                    ]),
                    new Assert\Length(['min' => 1, 'max' => 1000]),
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
                ],

            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'contact';
    }
}
