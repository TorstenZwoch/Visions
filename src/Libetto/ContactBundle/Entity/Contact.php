<?php

namespace Libetto\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * Contact
 *
 * @ORM\Table(name="tContact")
 * @ORM\Entity()
 */
class Contact extends BASE
{

    /**
     * @var string
     *
     * @ORM\Column(name="cType", type="string", length=255,nullable=true)
     */
    private $cType;

    /**
     * @var string
     *
     * @ORM\Column(name="cLanguage", type="string", length=10,nullable=true)
     */
    private $cLanguage;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="\Libetto\CustomerBundle\Entity\Customer", mappedBy="invoiceContact")
     * @var Collection
     */
    private $customer;

    /**
     * @var guid
     *
     * @ORM\Column(name="rCompanyOrPerson", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $rCompanyOrPerson;


    public function __construct() {
        //Initializing collection. Doctrine recognizes Collections, not arrays!
        $this->customer = new ArrayCollection();
    }
     
    //Getters and setters

    /**
     * Set cType
     *
     * @param string $cType
     * @return Contact
     */
    public function setCType($cType)
    {
        $this->cType = $cType;
    
        return $this;
    }

    /**
     * Get cType
     *
     * @return string 
     */
    public function getCType()
    {
        return $this->cType;
    }

    /**
     * Set cLanguage
     *
     * @param string $cLanguage
     * @return Contact
     */
    public function setCLanguage($cLanguage)
    {
        $this->cLanguage = $cLanguage;
    
        return $this;
    }

    /**
     * Get cLanguage
     *
     * @return string 
     */
    public function getCLanguage()
    {
        return $this->cLanguage;
    }

    /**
     * Set rCompanyOrPerson
     *
     * @param guid $rCompanyOrPerson
     * @return Contact
     */
    public function setRCompanyOrPerson($rCompanyOrPerson)
    {
        $this->rCompanyOrPerson = $rCompanyOrPerson;
    
        return $this;
    }

    /**
     * Get rCompanyOrPerson
     *
     * @return guid 
     */
    public function getRCompanyOrPerson()
    {
        return $this->rCompanyOrPerson;
    }

    /**
     * Add customer
     *
     * @param \Libetto\CustomerBundle\Entity\Customer $customer
     * @return Contact
     */
    public function addCustomer(\Libetto\CustomerBundle\Entity\Customer $customer)
    {
        $this->customer[] = $customer;
    
        return $this;
    }

    /**
     * Remove customer
     *
     * @param \Libetto\CustomerBundle\Entity\Customer $customer
     */
    public function removeCustomer(\Libetto\CustomerBundle\Entity\Customer $customer)
    {
        $this->customer->removeElement($customer);
    }
}