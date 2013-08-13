<?php

namespace Libetto\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * Contact
 
 * @ORM\Table(name="tContact")
 * @ORM\Entity()
 */
class Contact extends BASE
{

    /**
     * @var integer
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
     * @var guid
     *
     * @ORM\Column(name="rCompanyOrPerson", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $rCompanyOrPerson;

    /**
     *
     * @ORM\OneToMany(targetEntity="Person", mappedBy="contact")
     */
    protected $persons;

    /**
     *
     * @ORM\OneToMany(targetEntity="Company", mappedBy="contact")
     */
    protected $companies;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->persons = new \Doctrine\Common\Collections\ArrayCollection();
        $this->companies = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Add persons
     *
     * @param \Libetto\ContactBundle\Entity\Person $persons
     * @return Contact
     */
    public function addPerson(\Libetto\ContactBundle\Entity\Person $persons)
    {
        $this->persons[] = $persons;
    
        return $this;
    }

    /**
     * Remove persons
     *
     * @param \Libetto\ContactBundle\Entity\Person $persons
     */
    public function removePerson(\Libetto\ContactBundle\Entity\Person $persons)
    {
        $this->persons->removeElement($persons);
    }

    /**
     * Get persons
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Add companies
     *
     * @param \Libetto\ContactBundle\Entity\Company $companies
     * @return Contact
     */
    public function addCompanie(\Libetto\ContactBundle\Entity\Company $companies)
    {
        $this->companies[] = $companies;
    
        return $this;
    }

    /**
     * Remove companies
     *
     * @param \Libetto\ContactBundle\Entity\Company $companies
     */
    public function removeCompanie(\Libetto\ContactBundle\Entity\Company $companies)
    {
        $this->companies->removeElement($companies);
    }

    /**
     * Get companies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompanies()
    {
        return $this->companies;
    }
}