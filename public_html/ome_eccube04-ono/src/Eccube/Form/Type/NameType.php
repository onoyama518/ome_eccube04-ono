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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class NameType extends AbstractType
{
    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * NameType constructor.
     *
     * @param EccubeConfig $eccubeConfig
     */
    public function __construct(
        EccubeConfig $eccubeConfig
    ) {
        $this->eccubeConfig = $eccubeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $options['lastname_options']['required'] = $options['required'];
        $options['firstname_options']['required'] = $options['required'];

        // required の場合は NotBlank も追加する
        if ($options['required']) {
            $options['lastname_options']['constraints'] = array_merge([
                // new Assert\NotBlank(),
            ], $options['lastname_options']['constraints']);

            $options['firstname_options']['constraints'] = array_merge([
                // new Assert\NotBlank(),
            ], $options['firstname_options']['constraints']);
        }

        if (!isset($options['options']['error_bubbling'])) {
            $options['options']['error_bubbling'] = $options['error_bubbling'];
        }

        if (empty($options['lastname_name'])) {
            $options['lastname_name'] = $builder->getName() . '01';
        }
        if (empty($options['firstname_name'])) {
            $options['firstname_name'] = $builder->getName() . '02';
        }

        $builder
            ->add($options['lastname_name'], TextType::class, array_merge_recursive($options['options'], $options['lastname_options']))
            ->add($options['firstname_name'], TextType::class, array_merge_recursive($options['options'], $options['firstname_options']))
        ;

        $builder->setAttribute('lastname_name', $options['lastname_name']);
        $builder->setAttribute('firstname_name', $options['firstname_name']);
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $builder = $form->getConfig();
        $view->vars['lastname_name'] = $builder->getAttribute('lastname_name');
        $view->vars['firstname_name'] = $builder->getAttribute('firstname_name');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'options' => [],
            'lastname_options' => [
                'attr' => [
                    'placeholder' => 'common.last_name',
                ],
                'constraints' => [
                    // 2. 文字種・形式の厳格チェック: 名前（漢字）ひらがな・カタカナ・漢字・英字のみ
                    new Assert\Length(['min' => 1, 'max' => 50]),
                    new Assert\Regex([
                        'pattern' => '/^[ぁ-ゖァ-ヶ一-龯A-Za-zＡ-Ｚａ-ｚ々〇〻゙゚゛゜ーヽヾ]+$/u',
                        'message' => 'ひらがな、カタカナ、漢字、英字のみ入力可能です。'
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
                    new Assert\NotBlank([
                        'message' => 'お名前（姓）が入力されていません。',
                    ]),
                ],
            ],
            'firstname_options' => [
                'attr' => [
                    'placeholder' => 'common.first_name',
                ],
                'constraints' => [
                    // 2. 文字種・形式の厳格チェック: 名前（漢字）ひらがな・カタカナ・漢字・英字のみ
                    new Assert\Length(['min' => 1, 'max' => 50]),
                    new Assert\Regex([
                        'pattern' => '/^[ぁ-ゖァ-ヶ一-龯A-Za-zＡ-Ｚａ-ｚ々〇〻゙゚゛゜ーヽヾ]+$/u',
                        'message' => 'ひらがな、カタカナ、漢字、英字のみ入力可能です。'
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
                    new Assert\NotBlank([
                        'message' => 'お名前（名）が入力されていません。',
                    ]),
                ],
            ],
            'lastname_name' => '',
            'firstname_name' => '',
            'error_bubbling' => false,
            'inherit_data' => true,
            'trim' => true,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'name';
    }
}
