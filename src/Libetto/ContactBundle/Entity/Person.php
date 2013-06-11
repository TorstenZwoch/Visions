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
    
     /**
     * @var rCompany
     *
     * @ORM\Column(name="rCompany", type="guid")
     * @ORM\ManyToOne(targetEntity="tCompany", inversedBy="tPerson")
     * @ORM\JoinColumn(name="rCompany", referencedColumnName="cId")
     */
    private $rCompany;


    /**
     * Set cSalutation
     *
     * @param string $cSalutation
     * @return tPerson
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
     * @return tPerson
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
     * Set cFirstName
     *
     * @param string $cFirstName
     * @return tPerson
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
     * Set cLastName
     *
     * @param string $cLastName
     * @return tPerson
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
     * Set cEMail
     *
     * @param string $cEMail
     * @return tPerson
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
     * @return Person
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
}
