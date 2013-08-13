<?php

namespace Libetto\SupplierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;
/**
 * SupplierLead
 *
 * @ORM\Table(name="tSupplierLead")
 * @ORM\Entity(repositoryClass="Libetto\SupplierBundle\Entity\SupplierLeadRepository")
 */
class SupplierLead extends BASE
{

    /**
     * @var string
     *
     * @ORM\Column(name="cNumber", type="string", length=255)
     */
    private $cNumber;

    /**
     * @var guid
     *
     * @ORM\Column(name="rContact", type="guid")
     */
    private $rContact;

    /**
     * @var string
     *
     * @ORM\Column(name="cInfo", type="string", length=255)
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
     * @return SupplierLead
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
     * @return SupplierLead
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
     * @return SupplierLead
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
     * @return SupplierLead
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
     * @return SupplierLead
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
     * @return SupplierLead
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
}
