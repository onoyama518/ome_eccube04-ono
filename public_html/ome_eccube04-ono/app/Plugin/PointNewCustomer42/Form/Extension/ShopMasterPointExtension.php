<?php


namespace Plugin\PointNewCustomer42\Form\Extension;

use Eccube\Common\EccubeConfig;
use Eccube\Form\Type\Admin\ShopMasterType;
use Plugin\RelatedProduct4\Entity\RelatedProduct;
use Plugin\RelatedProduct4\Form\Type\Admin\RelatedProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

/**
 * Class ShopMasterPointExtension.
 */
class ShopMasterPointExtension extends AbstractTypeExtension
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
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('customer_registration_point', NumberType::class, [
                'required' => false,
                'constraints' => [
                    new Regex([
                        'pattern' => "/^\d+$/u",
                        'message' => 'form_error.numeric_only',
                    ]),
                    new Length(['max' => $this->eccubeConfig['eccube_int_len']]),
                ],
            ]);

    }

    /**
     * @return string
     */
    public function getExtendedType()
    {
        return ShopMasterType::class;
    }

    /**
     * @return string[]
     */
    public static function getExtendedTypes(): iterable
    {
        return [ShopMasterType::class];
    }
}
