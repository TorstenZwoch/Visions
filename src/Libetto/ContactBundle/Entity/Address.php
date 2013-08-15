<?php

namespace Libetto\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * TAddress
 * @ORM\Entity()
 * @ORM\Table(name="tAddress")
 */
class Address extends BASE
{

    /**
     * @var guid
     *
     * @ORM\Column(name="rPerson", type="guid",nullable=true)
     *
     */
    private $rPerson;

    /**
     * @var guid
     *
     * @ORM\Column(name="rCompany", type="guid",nullable=true)
     */
    private $rCompany;

    /**
     * @var string
     *
     * @ORM\Column(name="cStreet", type="string", length=255)
     */
    private $cStreet;

    /**
     * @var string
     *
     * @ORM\Column(name="cZipCode", type="string", length=64)
     */
    private $cZipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="cCountry", type="string", length=255)
     */
    private $cCountry;

    /**
     * @var integer
     *
     * @ORM\Column(name="cType", type="integer", nullable=true, options={"default":"0"})
     */
    private $cType;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cIsDefault", type="boolean")
     */
    private $cIsDefault;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="addresses", cascade={"persist"})
     * @ORM\JoinColumn(name="rCompany", referencedColumnName="cId")
     */
    protected $company;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="addresses", cascade={"persist"})
     * @ORM\JoinColumn(name="rPerson", referencedColumnName="cId")
     */
    protected $person;
    
    

    /**
     * Set rPerson
     *
     * @param guid $rPerson
     * @return Address
     */
    public function setRPerson($rPerson)
    {
        $this->rPerson = $rPerson;
    
        return $this;
    }

    /**
     * Get rPerson
     *
     * @return guid 
     */
    public function getRPerson()
    {
        return $this->rPerson;
    }

    /**
     * Set rCompany
     *
     * @param guid $rCompany
     * @return Address
     */
    public function setRCompany($rCompany)
    {
        $this->rCompany = $rCompany;
    
        return $this;
    }

    /**
     * Get rCompany
     *
     * @return guid 
     */
    public function getRCompany()
    {
        return $this->rCompany;
    }

    /**
     * Set cStreet
     *
     * @param string $cStreet
     * @return Address
     */
    public function setCStreet($cStreet)
    {
        $this->cStreet = $cStreet;
    
        return $this;
    }

    /**
     * Get cStreet
     *
     * @return string 
     */
    public function getCStreet()
    {
        return $this->cStreet;
    }

    /**
     * Set cZipCode
     *
     * @param string $cZipCode
     * @return Address
     */
    public function setCZipCode($cZipCode)
    {
        $this->cZipCode = $cZipCode;
    
        return $this;
    }

    /**
     * Get cZipCode
     *
     * @return string 
     */
    public function getCZipCode()
    {
        return $this->cZipCode;
    }

    /**
     * Set cCountry
     *
     * @param string $cCountry
     * @return Address
     */
    public function setCCountry($cCountry)
    {
        $this->cCountry = $cCountry;
    
        return $this;
    }

    /**
     * Get cCountry
     *
     * @return string 
     */
    public function getCCountry()
    {
        return $this->cCountry;
    }

    /**
     * Set cType
     *
     * @param integer $cType
     * @return Address
     */
    public function setCType($cType)
    {
        $this->cType = $cType;
    
        return $this;
    }

    /**
     * Get cType
     *
     * @return integer 
     */
    public function getCType()
    {
        return $this->cType;
    }

    /**
     * Set cIsDefault
     *
     * @param boolean $cIsDefault
     * @return Address
     */
    public function setCIsDefault($cIsDefault)
    {
        $this->cIsDefault = $cIsDefault;
    
        return $this;
    }

    /**
     * Get cIsDefault
     *
     * @return boolean 
     */
    public function getCIsDefault()
    {
        return $this->cIsDefault;
    }

    /**
     * Set company
     *
     * @param \Libetto\ContactBundle\Entity\Company $company
     * @return Address
     */
    public function setCompany(\Libetto\ContactBundle\Entity\Company $company = null)
    {
        $this->company = $company;
    
        return $this;
    }

    /**
     * Get company
     *
     * @return \Libetto\ContactBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set person
     *
     * @param \Libetto\ContactBundle\Entity\Person $person
     * @return Address
     */
    public function setPerson(\Libetto\ContactBundle\Entity\Person $person = null)
    {
        $this->person = $person;
    
        return $this;
    }

    /**
     * Get person
     *
     * @return \Libetto\ContactBundle\Entity\Person 
     */
    public function getPerson()
    {
        return $this->person;
    }
}