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
     * @var string
     *
     * @ORM\Column(name="cLanguage", type="string", length=10,nullable=true)
     */
    private $cLanguage;
    
     /**
     * @var string
     *
     * @ORM\Column(name="cCurrency", type="string", length=10,nullable=true)
     */
    private $cCurrency;
    
    
    
    /**
     *
     * @var type 
     * 
     * @ORM\OneToOne(targetEntity="Company",cascade={"persist"})
     * @ORM\JoinColumn(name="rCompany", referencedColumnName="cId",nullable=true)
     */
    protected $company;
    
    /**
     *
     * @var type 
     * 
     * @ORM\OneToOne(targetEntity="Person",cascade={"persist"})
     * @ORM\JoinColumn(name="rPerson", referencedColumnName="cId",nullable=true)
     */
    protected $person;


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
     * Set cCurrency
     *
     * @param string $cCurrency
     * @return Contact
     */
    public function setCCurrency($cCurrency)
    {
        $this->cCurrency = $cCurrency;
    
        return $this;
    }

    /**
     * Get cCurrency
     *
     * @return string 
     */
    public function getCCurrency()
    {
        return $this->cCurrency;
    }

    /**
     * Set company
     *
     * @param \Libetto\ContactBundle\Entity\Company $company
     * @return Contact
     */
    public function setCompany(\Libetto\ContactBundle\Entity\Company $company = null)
    {
        $this->person = null;
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
     * @return Contact
     */
    public function setPerson(\Libetto\ContactBundle\Entity\Person $person = null)
    {
        $this->company = null;
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