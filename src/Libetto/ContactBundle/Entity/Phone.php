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
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="Phone")
     * @ORM\JoinColumn(name="rPerson", referencedColumnName="cId")
     *
     */
    private $rPerson;

    /**
     * @var guid
     *
     * @ORM\Column(name="rCompany", type="guid")
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="Phone")
     * @ORM\JoinColumn(name="rCompany", referencedColumnName="cId")
     */
    private $rCompany;


   

    /**
     * Set cCountryCode
     *
     * @param integer $cCountryCode
     * @return tPhone
     */
    public function setCCountryCode($cCountryCode)
    {
        $this->cCountryCode = $cCountryCode;

        return $this;
    }

    /**
     * Get cCountryCode
     *
     * @return integer 
     */
    public function getCCountryCode()
    {
        return $this->cCountryCode;
    }

    /**
     * Set cRegion
     *
     * @param integer $cRegion
     * @return tPhone
     */
    public function setCRegion($cRegion)
    {
        $this->cRegion = $cRegion;

        return $this;
    }

    /**
     * Get cRegion
     *
     * @return integer 
     */
    public function getCRegion()
    {
        return $this->cRegion;
    }

    /**
     * Set cNumber
     *
     * @param string $cNumber
     * @return tPhone
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
     * @return tPhone
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
     * @return tPhone
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
     * @return tPhone
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
     * @return tPhone
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
