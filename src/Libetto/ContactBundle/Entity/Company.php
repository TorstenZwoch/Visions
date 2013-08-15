<?php

namespace Libetto\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * cCompany
 * @ORM\Entity()
 * @ORM\Table(name="tCompany")
 */
class Company extends BASE
{

    /**
     * @var string
     *
     * @ORM\Column(name="cName", type="string", length=255)
     */
    private $cName;

    /**
     * @var string
     *
     * @ORM\Column(name="cEMail", type="string", length=255)
     */
    private $cEMail;

    /**
     * @var guid
     *
     * @ORM\Column(name="rCompany", type="guid", nullable=true)
     */
    private $rCompany;

    /**
     *
     * @ORM\OneToMany(targetEntity="Address", mappedBy="company")
     */
    protected $adresses;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Person", mappedBy="company")
     */
    protected $employees;
   
    /**
     *
     * @ORM\OneToMany(targetEntity="Phone", mappedBy="company")
     */
    protected $phones;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
    
    /**
     * @ORM\OneToMany(targetEntity="Company", mappedBy="parent_company")
     */
    private $child_companies;

    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="child_companies", cascade={"persist"})
     * @ORM\JoinColumn(name="rCompany", referencedColumnName="cId")
     */
    private $parent_company;

  
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->employees = new \Doctrine\Common\Collections\ArrayCollection();
        $this->phones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->child_companies = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set cName
     *
     * @param string $cName
     * @return Company
     */
    public function setCName($cName)
    {
        $this->cName = $cName;
    
        return $this;
    }

    /**
     * Get cName
     *
     * @return string 
     */
    public function getCName()
    {
        return $this->cName;
    }

    /**
     * Set cEMail
     *
     * @param string $cEMail
     * @return Company
     */
    public function setCEMail($cEMail)
    {
        $this->cEMail = $cEMail;
    
        return $this;
    }

    /**
     * Get cEMail
     *
     * @return string 
     */
    public function getCEMail()
    {
        return $this->cEMail;
    }

    /**
     * Set rCompany
     *
     * @param guid $rCompany
     * @return Company
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
     * Add adresses
     *
     * @param \Libetto\ContactBundle\Entity\Address $adresses
     * @return Company
     */
    public function addAdresse(\Libetto\ContactBundle\Entity\Address $adresses)
    {
        $this->adresses[] = $adresses;
    
        return $this;
    }

    /**
     * Remove adresses
     *
     * @param \Libetto\ContactBundle\Entity\Address $adresses
     */
    public function removeAdresse(\Libetto\ContactBundle\Entity\Address $adresses)
    {
        $this->adresses->removeElement($adresses);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdresses()
    {
        return $this->adresses;
    }

    /**
     * Add employees
     *
     * @param \Libetto\ContactBundle\Entity\Person $employees
     * @return Company
     */
    public function addEmployee(\Libetto\ContactBundle\Entity\Person $employees)
    {
        $this->employees[] = $employees;
    
        return $this;
    }

    /**
     * Remove employees
     *
     * @param \Libetto\ContactBundle\Entity\Person $employees
     */
    public function removeEmployee(\Libetto\ContactBundle\Entity\Person $employees)
    {
        $this->employees->removeElement($employees);
    }

    /**
     * Get employees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * Add phones
     *
     * @param \Libetto\ContactBundle\Entity\Phone $phones
     * @return Company
     */
    public function addPhone(\Libetto\ContactBundle\Entity\Phone $phones)
    {
        $this->phones[] = $phones;
    
        return $this;
    }

    /**
     * Remove phones
     *
     * @param \Libetto\ContactBundle\Entity\Phone $phones
     */
    public function removePhone(\Libetto\ContactBundle\Entity\Phone $phones)
    {
        $this->phones->removeElement($phones);
    }

    /**
     * Get phones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Add child_companies
     *
     * @param \Libetto\ContactBundle\Entity\Company $childCompanies
     * @return Company
     */
    public function addChildCompanie(\Libetto\ContactBundle\Entity\Company $childCompanies)
    {
        $this->child_companies[] = $childCompanies;
    
        return $this;
    }

    /**
     * Remove child_companies
     *
     * @param \Libetto\ContactBundle\Entity\Company $childCompanies
     */
    public function removeChildCompanie(\Libetto\ContactBundle\Entity\Company $childCompanies)
    {
        $this->child_companies->removeElement($childCompanies);
    }

    /**
     * Get child_companies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildCompanies()
    {
        return $this->child_companies;
    }

    /**
     * Set parent_company
     *
     * @param \Libetto\ContactBundle\Entity\Company $parentCompany
     * @return Company
     */
    public function setParentCompany(\Libetto\ContactBundle\Entity\Company $parentCompany = null)
    {
        $this->parent_company = $parentCompany;
    
        return $this;
    }

    /**
     * Get parent_company
     *
     * @return \Libetto\ContactBundle\Entity\Company 
     */
    public function getParentCompany()
    {
        return $this->parent_company;
    }

    /**
     * Set contact
     *
     * @param \Libetto\ContactBundle\Entity\Contact $contact
     * @return Company
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