<?php

namespace Libetto\SupplierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\SupplierBundle\Entity\SupplierLead as SupplierLead;
/**
 * Supplier
 *
 * @ORM\Table(name="tSupplier")
 * @ORM\Entity(repositoryClass="Libetto\SupplierBundle\Entity\SupplierRepository")
 */
class Supplier extends SupplierLead
{
    /**
     * @var guid
     *
     * @ORM\Column(name="rInvoiceContact", type="guid")
     */
    private $rInvoiceContact;

    /**
     * Set rInvoiceContact
     *
     * @param guid $rInvoiceContact
     * @return Supplier
     */
    public function setRInvoiceContact($rInvoiceContact)
    {
        $this->rInvoiceContact = $rInvoiceContact;
    
        return $this;
    }

    /**
     * Get rInvoiceContact
     *
     * @return guid 
     */
    public function getRInvoiceContact()
    {
        return $this->rInvoiceContact;
    }
}
