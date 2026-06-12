<?php

/*
 * This file is part of FAX42
 * Copyright(c) U-Mebius Inc. All Rights Reserved.
 *
 * https://umebius.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\FAX42\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;

/**
 * Trait ShippingTrait
 *
 * @EntityExtension("Eccube\Entity\Shipping")
 */
trait ShippingTrait
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="fax", type="string", length=14, nullable=true)
     */
    private $fax;

    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * @return $this
     */
    public function setFax(?string $fax)
    {
        $this->fax = $fax;

        return $this;
    }
}
