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
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ZipType
 */
class PostalType extends AbstractType
{
    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * ZipType constructor.
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
        $builder->addEventSubscriber(new \Eccube\Form\EventListener\ConvertKanaListener());
        $builder->addEventSubscriber(new \Eccube\Form\EventListener\TruncateHyphenListener());
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setNormalizer('constraints', function ($options, $value) {
            $constraints = [];
            // requiredがtrueに指定されている場合, NotBlankを追加
            if (isset($options['required']) && true === $options['required']) {
                $constraints[] = new Assert\NotBlank([
                    'message' => '郵便番号が入力されていません。',
                ]);
            }

            // 郵便番号形式チェック（数字とハイフンのみ）
            $constraints[] = new Assert\Regex([
                'pattern' => '/^[0-9\-]+$/',
                'message' => '郵便番号は数字とハイフンのみで入力してください。',
            ]);

            $constraints[] = new Assert\Length([
                'max' => $this->eccubeConfig['eccube_postal_code'],
                'maxMessage' => '郵便番号は{{ limit }}文字以内で入力してください。',
            ]);

            // 不正文字・禁止語・URL・スクリプトタグの入力制限
            $constraints[] = new Assert\Regex([
                'pattern' => '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/',
                'message' => '不正な文字が含まれています。',
                'match' => false,
            ]);

            $constraints[] = new Assert\Regex([
                'pattern' => '/\s*<iframe|iframe|\s*<object|object|\s*<embed|embed|<script|script|javascript:|vbscript:|onload=|onclick=|eval\(|document\.|window\./i',
                'message' => '不正なHTMLタグまたはスクリプトが含まれています。',
                'match' => false,
            ]);


            return array_merge($constraints, $value);
        });

        $resolver->setDefaults([
            'options' => [],
            'attr' => [
                'class' => 'p-postal-code',
                'placeholder' => 'common.postal_code_sample',
            ],
            'trim' => true,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return TelType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'postal';
    }
}
