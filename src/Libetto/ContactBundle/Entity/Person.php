<?php

namespace Libetto\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;
/**
 * tPerson
 * @ORM\Entity()
 * @ORM\Table(name="tPerson")
 */
class Person extends BASE
{
    /**
     * @var string
     *
     * @ORM\Column(name="cSalutation", type="string", length=255)
     */
    private $cSalutation;

    /**
     * @var string
     *
     * @ORM\Column(name="cTitle", type="string", length=255)
     */
    private $cTitle;


    /**
     * @var string
     *
     * @ORM\Column(name="cLastName", type="string", length=255)
     */
    private $cLastName;

    /**
     * @var string
     *
     * @ORM\Column(name="cFirstName", type="string", length=255)
     */
    private $cFirstName;

    /**
     * @var string
     *
     * @ORM\Column(name="cEMail", type="string", length=255)
     */
    private $cEMail;
    

    /*
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="employees", cascade={"persist"})
     * @ORM\JoinColumn(name="rCompany", referencedColumnName="cId")
     */
    
    protected $company;
    
    
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Address", mappedBy="person", cascade={"persist"})
     */
    protected $adresses;
    
    
    
        
    /**
     *
     * @ORM\OneToMany(targetEntity="Phone", mappedBy="person", cascade={"persist"})
     */
    protected $phones;
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->phones = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set cSalutation
     *
     * @param string $cSalutation
     * @return Person
     */
    public function setCSalutation($cSalutation)
    {
        $this->cSalutation = $cSalutation;
    
        return $this;
    }

    /**
     * Get cSalutation
     *
     * @return string 
     */
    public function getCSalutation()
    {
        return $this->cSalutation;
    }

    /**
     * Set cTitle
     *
     * @param string $cTitle
     * @return Person
     */
    public function setCTitle($cTitle)
    {
        $this->cTitle = $cTitle;
    
        return $this;
    }

    /**
     * Get cTitle
     *
     * @return string 
     */
    public function getCTitle()
    {
        return $this->cTitle;
    }

    /**
     * Set cLastName
     *
     * @param string $cLastName
     * @return Person
     */
    public function setCLastName($cLastName)
    {
        $this->cLastName = $cLastName;
    
        return $this;
    }

    /**
     * Get cLastName
     *
     * @return string 
     */
    public function getCLastName()
    {
        return $this->cLastName;
    }

    /**
     * Set cFirstName
     *
     * @param string $cFirstName
     * @return Person
     */
    public function setCFirstName($cFirstName)
    {
        $this->cFirstName = $cFirstName;
    
        return $this;
    }

    /**
     * Get cFirstName
     *
     * @return string 
     */
    public function getCFirstName()
    {
        return $this->cFirstName;
    }

    /**
     * Set cEMail
     *
     * @param string $cEMail
     * @return Person
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
     * Add adresses
     *
     * @param \Libetto\ContactBundle\Entity\Address $adresses
     * @return Person
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
     * Set contact
     *
     * @param \Libetto\ContactBundle\Entity\Contact $contact
     * @return Person
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

    /**
     * Add phones
     *
     * @param \Libetto\ContactBundle\Entity\Phone $phones
     * @return Person
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
}