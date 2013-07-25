<?php

namespace Libetto\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * Customer
 *
 * @ORM\Table(name="tCustomer")
 * @ORM\Entity()
 */
class Customer extends BASE
{      
    
    /**
     * @var string
     *
     * @ORM\Column(name="cNumber", type="string", length=255)
     */
    private $cNumber;
    
    /**
     * @var Contact
     *
     * @ORM\OneToOne(targetEntity="Libetto\ContactBundle\Entity\Contact")
     * @ORM\JoinColumn(name="rInvoiceContact", referencedColumnName="cId")
     */
    private $invoiceContact;  

    /**
     * @var string
     *
     * @ORM\Column(name="cInfo", type="text",nullable=true)
     */
    private $cInfo;

    /**
     * @var guid
     *
     * @ORM\Column(name="rContactGroup", type="guid")
     */
    private $rContactGroup;

    /**
     * @var guid
     *
     * @ORM\Column(name="rTermsOfPayment", type="guid")
     */
    private $rTermsOfPayment;

    /**
     * @var guid
     *
     * @ORM\Column(name="rPricelist", type="guid")
     */
    private $rPricelist;


    /**
     * Set cNumber
     *
     * @param string $cNumber
     * @return Customer
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
     * Set cInfo
     *
     * @param string $cInfo
     * @return Customer
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
     * @return Customer
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
     * @return Customer
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
     * @return Customer
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
     * @return Customer
     */
    public function setInvoiceContact(\Libetto\ContactBundle\Entity\Contact $invoiceContact = null)
    {
        $this->invoiceContact = $invoiceContact;
    
        return $this;
    }
    
    /**
     * Set invoiceContact
     *
     * @param \Libetto\ContactBundle\Entity\Contact $invoiceContact
     * @return Customer
     */
    public function getInvoiceContact()
    {    
        return $this->invoiceContact;
    }    
    
}