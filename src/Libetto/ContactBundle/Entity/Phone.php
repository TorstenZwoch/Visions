<?php

namespace Libetto\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * tPhone
 * @ORM\Entity()
 * @ORM\Table(name="tPhone")
 */
class Phone extends BASE
{
 

    /**
     * @var integer
     *
     * @ORM\Column(name="cCountryCode", type="string", length=64)
     */
    private $cCountryCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="cRegion", type="string", length=64)
     */
    private $cRegion;

    /**
     * @var string
     *
     * @ORM\Column(name="cNumber", type="string", length=64)
     */
    private $cNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="cOfficeNumber", type="string", length=64)
     */
    private $cOfficeNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="cType", type="integer")
     */
    private $cType;

    /**
     * @var guid
     *
     * @ORM\Column(name="rPerson", type="guid")
     *
     */
    private $rPerson;

    /**
     * @var guid
     *
     * @ORM\Column(name="rCompany", type="guid")
     */
    private $rCompany;
    
   /**
     *
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="phones")
     * @ORM\JoinColumn(name="rCompany", referencedColumnName="cId")
     */
    protected $company;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="phones")
     * @ORM\JoinColumn(name="rPerson", referencedColumnName="cId")
     */
    protected $person;
   

    

    /**
     * Set cCountryCode
     *
     * @param string $cCountryCode
     * @return Phone
     */
    public function setCCountryCode($cCountryCode)
    {
        $this->cCountryCode = $cCountryCode;
    
        return $this;
    }

    /**
     * Get cCountryCode
     *
     * @return string 
     */
    public function getCCountryCode()
    {
        return $this->cCountryCode;
    }

    /**
     * Set cRegion
     *
     * @param string $cRegion
     * @return Phone
     */
    public function setCRegion($cRegion)
    {
        $this->cRegion = $cRegion;
    
        return $this;
    }

    /**
     * Get cRegion
     *
     * @return string 
     */
    public function getCRegion()
    {
        return $this->cRegion;
    }

    /**
     * Set cNumber
     *
     * @param string $cNumber
     * @return Phone
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
     * Set cOfficeNumber
     *
     * @param string $cOfficeNumber
     * @return Phone
     */
    public function setCOfficeNumber($cOfficeNumber)
    {
        $this->cOfficeNumber = $cOfficeNumber;
    
        return $this;
    }

    /**
     * Get cOfficeNumber
     *
     * @return string 
     */
    public function getCOfficeNumber()
    {
        return $this->cOfficeNumber;
    }

    /**
     * Set cType
     *
     * @param integer $cType
     * @return Phone
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
     * Set rPerson
     *
     * @param guid $rPerson
     * @return Phone
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
     * @return Phone
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
     * Set company
     *
     * @param \Libetto\ContactBundle\Entity\Company $company
     * @return Phone
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
     * @return Phone
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