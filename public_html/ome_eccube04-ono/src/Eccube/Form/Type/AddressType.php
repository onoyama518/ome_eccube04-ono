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
use Eccube\Form\Type\Master\PrefType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class AddressType extends AbstractType
{
    /**
     * @var array
     */
    protected $config;

    /**
     * {@inheritdoc}
     *
     * AddressType constructor.
     *
     * @param EccubeConfig $eccubeConfig
     */
    public function __construct(EccubeConfig $eccubeConfig)
    {
        $this->config = $eccubeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $options['pref_options']['required'] = $options['required'];
        $options['addr01_options']['required'] = $options['required'];
        $options['addr02_options']['required'] = $options['required'];

        // required の場合は NotBlank も追加する
        if ($options['required']) {
            $options['pref_options']['constraints'] = array_merge([

                new Assert\NotBlank([
                    'message' => '都道府県が選択されていません。',
                ]),

            ], $options['pref_options']['constraints']);

            $options['addr01_options']['constraints'] = array_merge([
                new Assert\NotBlank([
                    'message' => '市区町村が入力されていません。',
                ]),
            ], $options['addr01_options']['constraints']);

            $options['addr02_options']['constraints'] = array_merge([
                new Assert\NotBlank([
                    'message' => '番地が入力されていません。',
                ]),
            ], $options['addr02_options']['constraints']);
        }

        if (!isset($options['options']['error_bubbling'])) {
            $options['options']['error_bubbling'] = $options['error_bubbling'];
        }

        $builder
            ->add($options['pref_name'], PrefType::class, array_merge_recursive($options['options'], $options['pref_options']))
            ->add($options['addr01_name'], TextType::class, array_merge_recursive($options['options'], $options['addr01_options']))
            ->add($options['addr02_name'], TextType::class, array_merge_recursive($options['options'], $options['addr02_options']))
        ;

        $builder->setAttribute('pref_name', $options['pref_name']);
        $builder->setAttribute('addr01_name', $options['addr01_name']);
        $builder->setAttribute('addr02_name', $options['addr02_name']);
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $builder = $form->getConfig();
        $view->vars['pref_name'] = $builder->getAttribute('pref_name');
        $view->vars['addr01_name'] = $builder->getAttribute('addr01_name');
        $view->vars['addr02_name'] = $builder->getAttribute('addr02_name');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'options' => [],
            'pref_options' => [
                'constraints' => [
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
                'attr' => ['class' => 'p-region-id']
            ],
            'addr01_options' => [
                'constraints' => [
                    new Assert\Length(['min' => 1, 'max' => 50]),

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
                'attr' => [
                    'class' => 'p-locality p-street-address',
                    // 'placeholder' => 'common.address_sample_01',
                ],
            ],
            'addr02_options' => [
                'constraints' => [
                    new Assert\Length(['min' => 1, 'max' => 50]),
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
                'attr' => [
                    'class' => 'p-extended-address',
                    // 'placeholder' => 'common.address_sample_02',
                ],
            ],
            'pref_name' => 'pref',
            'addr01_name' => 'addr01',
            'addr02_name' => 'addr02',
            'error_bubbling' => false,
            'inherit_data' => true,
            'trim' => true,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'address';
    }
}
