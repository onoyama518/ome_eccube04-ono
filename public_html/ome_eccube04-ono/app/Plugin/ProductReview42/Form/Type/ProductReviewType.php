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

namespace Plugin\ProductReview42\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Eccube\Common\EccubeConfig;
use Eccube\Form\Type\Master\SexType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Url;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class ProductReviewType
 * [商品レビュー]-[レビューフロント]用Form.
 */
class ProductReviewType extends AbstractType
{
    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * ProductReviewType constructor.
     *
     * @param EccubeConfig $eccubeConfig
     */
    public function __construct(EccubeConfig $eccubeConfig)
    {
        $this->eccubeConfig = $eccubeConfig;
    }

    /**
     * build form.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $config = $this->eccubeConfig;
        $builder
            ->add('reviewer_name', TextType::class, [
                'required' => false,
                'label' => 'product_review.form.product_review.reviewer_name',
                    'constraints' => [
                        new NotBlank([
                            'message' => '投稿者が入力されていません。',
                        ]),
                        new Length([
                            'max' => $config['eccube_stext_len'],
                            'maxMessage' => '投稿者名は{{ limit }}文字以内で入力してください',
                        ]),
                        new Regex([
                            'pattern' => '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/',
                            'message' => '不正な文字が含まれています。',
                            'match' => false,
                        ]),
                        new Regex([
                            'pattern' => '/\s*<iframe|iframe|\s*<object|object|\s*<embed|embed|<script|script|javascript:|vbscript:|onload=|onclick=|eval\(|document\.|window\./i',
                            'message' => '不正なHTMLタグまたはスクリプトが含まれています。',
                            'match' => false,
                        ]),
                    ],
                'attr' => [
                    'maxlength' => $config['eccube_stext_len'],
                ],
            ])
            ->add('reviewer_url', TextType::class, [
                'label' => 'product_review.form.product_review.reviewer_url',
                'required' => false,
                    'constraints' => [
                        new Length([
                            'max' => $config['eccube_mltext_len'],
                            'maxMessage' => 'URLは{{ limit }}文字以内で入力してください',
                        ]),
                        new Callback(function ($value, ExecutionContextInterface $context) {
                            if ($value === null || $value === '') {
                                return;
                            }
                            $url = trim((string) $value);

                            // スキームが https:// でない場合は専用メッセージを返す
                            if (stripos($url, 'https://') !== 0) {
                                $context->buildViolation('httpsから入力してください')->addViolation();
                                return;
                            }

                            // フォーマット自体が不正な場合は汎用メッセージ
                            if (!filter_var($url, FILTER_VALIDATE_URL)) {
                                $context->buildViolation('正しいURL形式で入力してください')->addViolation();
                            }
                        }),
                    ],
                'attr' => [
                    'maxlength' => $config['eccube_mltext_len'],
                ],
            ])
            ->add('sex', SexType::class, [
                'required' => false,
            ])
            ->add('recommend_level', ChoiceType::class, [
                'required' => false,
                'label' => 'product_review.form.product_review.recommend_level',
                'choices' => array_flip([
                    '5' => '★★★★★',
                    '4' => '★★★★',
                    '3' => '★★★',
                    '2' => '★★',
                    '1' => '★',
                ]),
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                    'constraints' => [
                        new NotBlank([
                            'message' => 'おすすめレベルが選択されていません。',
                        ]),
                    ],
            ])
                ->add('title', TextType::class, [
                    'required' => false,
                'label' => 'product_review.form.product_review.title',
                    'constraints' => [
                        new NotBlank([
                            'message' => 'タイトルが入力されていません。',
                        ]),
                        new Length([
                            'max' => 50,
                            'maxMessage' => 'タイトルは{{ limit }}文字以内で入力してください',
                        ]),
                        new Regex([
                            'pattern' => '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/',
                            'message' => '不正な文字が含まれています。',
                            'match' => false,
                        ]),
                        new Regex([
                            'pattern' => '/\s*<iframe|iframe|\s*<object|object|\s*<embed|embed|<script|script|javascript:|vbscript:|onload=|onclick=|eval\(|document\.|window\./i',
                            'message' => '不正なHTMLタグまたはスクリプトが含まれています。',
                            'match' => false,
                        ]),
                    ],
                'attr' => [
                    'maxlength' => $config['eccube_stext_len'],
                ],
            ])
            ->add('comment', TextareaType::class, [
                'required' => false,
                'label' => 'product_review.form.product_review.comment',
                    'constraints' => [
                        new NotBlank([
                            'message' => 'レビュー内容が入力されていません。',
                        ]),
                        new Length([
                            'max' => $config['eccube_ltext_len'],
                            'maxMessage' => 'レビュー内容は{{ limit }}文字以内で入力してください',
                        ]),
                        new Regex([
                            'pattern' => '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/',
                            'message' => '不正な文字が含まれています。',
                            'match' => false,
                        ]),
                        new Regex([
                            'pattern' => '/\s*<iframe|iframe|\s*<object|object|\s*<embed|embed|<script|script|javascript:|vbscript:|onload=|onclick=|eval\(|document\.|window\./i',
                            'message' => '不正なHTMLタグまたはスクリプトが含まれています。',
                            'match' => false,
                        ]),
                    ],
                'attr' => [
                    'maxlength' => $config['eccube_ltext_len'],
                ],
            ]);
    }
}
