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

namespace Eccube\Form\Type\Front;

use Eccube\Common\EccubeConfig;
use Eccube\Form\Validator\Email;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ForgotType
 */
class ForgotType extends AbstractType
{
    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * ForgotType constructor.
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
        $builder->add('login_email', EmailType::class, [
            'attr' => [
                'maxlength' => $this->eccubeConfig['eccube_stext_len'],
            ],
            'constraints' => [
                new Assert\NotBlank([
                    'message' => 'メールアドレスが入力されていません。',
                ]),
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
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'forgot';
    }
}
