<?php

namespace Libetto\SupplierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;
/**
 * Supplier
 *
 * @ORM\Table(name="tSupplier")
 * @ORM\Entity(repositoryClass="Libetto\SupplierBundle\Entity\SupplierRepository")
 */
class Supplier extends BASE
{    
    /**
     * @var guid
     *
     * @ORM\Column(name="rInvoiceContact", nullable=true, type="guid")
     */    
    private $rInvoiceContact;
    
    /**
     * @var Contact|null
     * 
     * @ORM\OneToOne(targetEntity="Libetto\ContactBundle\Entity\Contact",cascade={"persist"})
     * @ORM\JoinColumn(name="rInvoiceContact", referencedColumnName="cId")
     */
    private $invoiceContact;    

     /**
     * @var string
     *
     * @ORM\Column(name="cNumber", type="string", length=255)
     */
    private $cNumber;
  
    /**
     * @var guid
     *
     * @ORM\Column(name="rContact", nullable=true, type="guid")
     */
    private $rContact;

    /**
     * @var Contact|null
     * 
     * @ORM\OneToOne(targetEntity="Libetto\ContactBundle\Entity\Contact",cascade={"persist"})
     * @ORM\JoinColumn(name="rContact", referencedColumnName="cId")
     */
    private $contact;    
    /**
     * @var string
     *
     * @ORM\Column(name="cInfo", nullable=true, type="text")
     */
    private $cInfo;

    /**
     * @var guid
     *
     * @ORM\Column(name="rContactGroup", nullable=true, type="guid")
     */
    private $rContactGroup;

    /**
     * @var guid
     *
     * @ORM\Column(name="rTermsOfPayment", nullable=true, type="guid")
     */
    private $rTermsOfPayment;

    /**
     * @var guid
     *
     * @ORM\Column(name="rPricelist", nullable=true, type="guid")
     */
    private $rPricelist;
    
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

    /**
     * Set cNumber
     *
     * @param string $cNumber
     * @return Supplier
     */
    public function setCNumber($cNumber)
    {
        $this->cNumber = $cNumber;
    
        return $this;
    }

    /**
     * Get cNumber
     *
     * @return string 
     */
    public function getCNumber()
    {
        return $this->cNumber;
    }

    /**
     * Set rContact
     *
     * @param guid $rContact
     * @return Supplier
     */
    public function setRContact($rContact)
    {
        $this->rContact = $rContact;
    
        return $this;
    }

    /**
     * Get rContact
     *
     * @return guid 
     */
    public function getRContact()
    {
        return $this->rContact;
    }

    /**
     * Set cInfo
     *
     * @param string $cInfo
     * @return Supplier
     */
    public function setCInfo($cInfo)
    {
        $this->cInfo = $cInfo;
    
        return $this;
    }

    /**
     * Get cInfo
     *
     * @return string 
     */
    public function getCInfo()
    {
        return $this->cInfo;
    }

    /**
     * Set rContactGroup
     *
     * @param guid $rContactGroup
     * @return Supplier
     */
    public function setRContactGroup($rContactGroup)
    {
        $this->rContactGroup = $rContactGroup;
    
        return $this;
    }

    /**
     * Get rContactGroup
     *
     * @return guid 
     */
    public function getRContactGroup()
    {
        return $this->rContactGroup;
    }

    /**
     * Set rTermsOfPayment
     *
     * @param guid $rTermsOfPayment
     * @return Supplier
     */
    public function setRTermsOfPayment($rTermsOfPayment)
    {
        $this->rTermsOfPayment = $rTermsOfPayment;
    
        return $this;
    }

    /**
     * Get rTermsOfPayment
     *
     * @return guid 
     */
    public function getRTermsOfPayment()
    {
        return $this->rTermsOfPayment;
    }

    /**
     * Set rPricelist
     *
     * @param guid $rPricelist
     * @return Supplier
     */
    public function setRPricelist($rPricelist)
    {
        $this->rPricelist = $rPricelist;
    
        return $this;
    }

    /**
     * Get rPricelist
     *
     * @return guid 
     */
    public function getRPricelist()
    {
        return $this->rPricelist;
    }
    
    /**
     * Set invoiceContact
     *
     * @param \Libetto\ContactBundle\Entity\Contact $invoiceContact
     * @return Supplier
     */
    public function setInvoiceContact(\Libetto\ContactBundle\Entity\Contact $invoiceContact = null)
    {
        $this->invoiceContact = $invoiceContact;
    
        return $this;
    }

    /**
     * Get invoiceContact
     *
     * @return \Libetto\ContactBundle\Entity\Contact 
     */
    public function getInvoiceContact()
    {
        return $this->invoiceContact;
    }
    
    /**
     * Set contact
     *
     * @param \Libetto\ContactBundle\Entity\Contact $contact
     * @return Customer
     */
    public function setContact(\Libetto\ContactBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;
    
        return $this;
    }

    /**
     * Get contact
     *
     * @return \Libetto\ContactBundle\Entity\Contact 
     */
    public function getContact()
    {
        return $this->contact;
    }
}
