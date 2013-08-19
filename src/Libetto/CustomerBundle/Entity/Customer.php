<?php

namespace Libetto\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;
use Libetto\ContactBundle\Entity\Contact as Contact;

/**
 * Customer
 *
 * @ORM\Table(name="tCustomer")
 * @ORM\Entity(repositoryClass="Libetto\CustomerBundle\Entity\CustomerRepository")
 */
class Customer extends BASE {

    /**
     * @var string
     *
     * @ORM\Column(name="cNumber", type="string", length=255, nullable=true)
     */
    private $cNumber;

    /**
     * @var guid
     *
     * @ORM\Column(name="rInvoiceContact", type="guid",nullable=true, length=36)
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $rInvoiceContact;

    /**
     * @var Contact|null
     * 
     * @ORM\OneToOne(targetEntity="Libetto\ContactBundle\Entity\Contact", cascade={"persist"})
     * @ORM\JoinColumn(name="rInvoiceContact", referencedColumnName="cId")
     */
    private $invoiceContact;

    /**
     * @var guid
     *
     * @ORM\Column(name="rContact", type="guid",nullable=true, length=36)
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $rContact;

    /**
     * @var Contact|null
     * 
     * @ORM\OneToOne(targetEntity="Libetto\ContactBundle\Entity\Contact", cascade={"persist"})
     * @ORM\JoinColumn(name="rContact", referencedColumnName="cId")
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="cInfo", type="text",nullable=true)
     */
    private $cInfo;

    /**
     * @var guid
     *
     * @ORM\Column(name="rContactGroup", type="guid",nullable=true, length=36)
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $rContactGroup;

    /**
     * @var guid
     *
     * @ORM\Column(name="rTermsOfPayment", type="guid",nullable=true, length=36)
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $rTermsOfPayment;

    /**
     * @var guid
     *
     * @ORM\Column(name="rPricelist", type="guid",nullable=true, length=36)
     * @ORM\GeneratedValue(strategy="UUID")
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
     * Set rInvoiceContact
     *
     * @param guid $rInvoiceContact
     * @return Customer
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
     * Set rContact
     *
     * @param guid $rContact
     * @return Customer
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