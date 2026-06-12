<?php

namespace Plugin\ContactManagement42\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * ContactStatus
 *
 * @ORM\Table(name="plg_contact_management4_contact_status")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discriminator_type", type="string", length=255)
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="Plugin\ContactManagement42\Repository\ContactStatusRepository")
 * @ORM\Cache(usage="NONSTRICT_READ_WRITE")
 */
class ContactStatus extends \Eccube\Entity\Master\AbstractMasterEntity
{

}
