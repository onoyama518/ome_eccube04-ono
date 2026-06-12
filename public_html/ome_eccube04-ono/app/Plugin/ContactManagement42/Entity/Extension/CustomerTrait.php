<?php

namespace Plugin\ContactManagement42\Entity\Extension;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;
use Plugin\ContactManagement42\Entity\Contact;

/**
 * @EntityExtension("Eccube\Entity\Customer")
 */
trait CustomerTrait
{
    /**
     * @var Contact[]|Collection
     *
     * @ORM\OneToMany(targetEntity="Plugin\ContactManagement42\Entity\Contact", mappedBy="Customer", cascade={"persist", "remove"})
     * @ORM\OrderBy({
     *     "id"="DESC"
     * })
     */
    private $Contacts;

    /**
     * @return Contact[]|Collection
     */
    public function getContacts()
    {
        if (null === $this->Contacts) {
            $this->Contacts = new ArrayCollection();
        }

        return $this->Contacts;
    }

    /**
     * @param Contact $Contact
     */
    public function addContact(Contact $Contact)
    {
        if (null === $this->Contacts) {
            $this->Contacts = new ArrayCollection();
        }

        $this->Contacts[] = $Contact;
    }

    /**
     * @param Contact $Contact
     *
     * @return bool
     */
    public function removeContact(Contact $Contact)
    {
        if (null === $this->Contacts) {
            $this->Contacts = new ArrayCollection();
        }

        return $this->Contacts->removeElement($Contact);
    }
}
