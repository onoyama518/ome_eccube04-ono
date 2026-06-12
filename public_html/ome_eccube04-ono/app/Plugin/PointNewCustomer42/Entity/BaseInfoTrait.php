<?php

namespace Plugin\PointNewCustomer42\Entity;
use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;

/**
 * @EntityExtension("Eccube\Entity\BaseInfo")
 */
trait BaseInfoTrait
{
    /**
     * @ORM\Column(name="customer_registration_point", type="decimal", nullable=true, precision=12, scale=2, options={"unsigned":true,"default":0})
     */
    private $customer_registration_point;

    /**
     * @return mixed
     */
    public function getCustomerRegistrationPoint()
    {
        return $this->customer_registration_point;
    }

    /**
     * @param mixed $customer_registration_point
     * @return BaseInfoTrait
     */
    public function setCustomerRegistrationPoint($customer_registration_point)
    {
        $this->customer_registration_point = $customer_registration_point;
        return $this;
    }

}
