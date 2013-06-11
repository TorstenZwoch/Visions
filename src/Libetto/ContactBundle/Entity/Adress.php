<?php

namespace Libetto\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * TAdress
 * @ORM\Entity()
 * @ORM\Table(name="tAdress")
 */
class Adress extends BASE
{

        /**
     * @var guid
     *
     * @ORM\Column(name="rPerson", type="guid")
     * @ORM\ManyToOne(targetEntity="tPerson", inversedBy="tPhone")
     * @ORM\JoinColumn(name="rPerson", referencedColumnName="cId")
     *
     */
    private $rPerson;

    /**
     * @var guid
     *
     * @ORM\Column(name="rCompany", type="guid")
     * @ORM\ManyToOne(targetEntity="tCompany", inversedBy="tPhone")
     * @ORM\JoinColumn(name="rCompany", referencedColumnName="cId")
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
     * @ORM\Column(name="cType", type="integer")
     */
    private $cType;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cIsDefault", type="boolean")
     */
    private $cIsDefault;


    /**
     * Set rPerson
     *
     * @param guid $rPerson
     * @return tAdress
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
     * @return tAdress
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
     * @return tAdress
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
     * @return tAdress
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
     * @return tAdress
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
     * @return tAdress
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
     * @return tAdress
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
}
