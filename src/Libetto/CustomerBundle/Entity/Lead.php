<?php

namespace Libetto\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;
use Libetto\ContactBundle\Entity\Contact as Contact;

/**
 * Lead
 *
 * @ORM\Table(name="tLead")
 * @ORM\Entity()
 */
class Lead extends BASE
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
     * @ORM\Column(name="rContact", type="guid",nullable=true, length=36)
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $rContact;    
    
   /**
     * @var Contact|null
     * 
     * @ORM\OneToOne(targetEntity="Libetto\ContactBundle\Entity\Contact")
     * @ORM\JoinColumn(name="rContact", referencedColumnName="cId")
     */
    private $contact;     
    

    /**
     * @var string
     *
     * @ORM\Column(name="cInfo", type="text")
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
     * @return Lead
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
     * @return Lead
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
     * @return Lead
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
     * @return Lead
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
     * @return Lead
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
     * @return Lead
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
     * Set contact
     *
     * @param \Libetto\ContactBundle\Entity\Contact $contact
     * @return Lead
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