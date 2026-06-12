<?php

namespace Eccube\Form\Type;

use Eccube\Common\EccubeConfig;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class RepeatedPasswordType extends AbstractType
{
    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * RepeatedPasswordType constructor.
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
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'type' => TextType::class, // TextType のままにする
            'invalid_message' => 'form_error.same_password',
            'required' => true,
            'error_bubbling' => false,
            'options' => [
                'constraints' => [
                    new Assert\Length([
                        'min' => $this->eccubeConfig['eccube_password_min_len'],
                        'max' => $this->eccubeConfig['eccube_password_max_len'],
                    ]),
                ],
            ],
            'first_options' => [
                'attr' => [
                    'type' => 'password', // 明示的に type="password" を指定
                ],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'パスワードが入力されていません。',
                    ])
                ]
            ],
            'second_options' => [
                'attr' => [
                    'type' => 'password', // 明示的に type="password" を指定
                ],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'パスワード（確認用）が入力されていません。',
                    ])
                ]
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return RepeatedType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'repeated_password';
    }
}
