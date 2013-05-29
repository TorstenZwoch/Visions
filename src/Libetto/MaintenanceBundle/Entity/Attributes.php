<?php

namespace Libetto\MaintenanceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attributes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Libetto\MaintenanceBundle\Entity\AttributesRepository")
 */
class Attributes extends \Libetto\CoreBundle\Entity\BaseTable
{
    /**
     * @var guid
     *
     * @ORM\Column(name="ref_id", type="guid")
     */
    private $refId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=64)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="value_STR64", type="string", length=64)
     */
    private $valueSTR64;

    /**
     * @var string
     *
     * @ORM\Column(name="value_STR255", type="string", length=255)
     */
    private $valueSTR255;

    /**
     * @var string
     *
     * @ORM\Column(name="value_TEXT", type="text")
     */
    private $valueTEXT;

    /**
     * @var boolean
     *
     * @ORM\Column(name="value_BOOL", type="boolean")
     */
    private $valueBOOL;

    /**
     * @var integer
     *
     * @ORM\Column(name="value_INT", type="integer")
     */
    private $valueINT;

    /**
     * @var float
     *
     * @ORM\Column(name="value_DEC", type="decimal")
     */
    private $valueDEC;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="value_DATE", type="date")
     */
    private $valueDATE;

    /**
     * @var guid
     *
     * @ORM\Column(name="value_KEY", type="guid")
     */
    private $valueKEY;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set refId
     *
     * @param guid $refId
     * @return Attributes
     */
    public function setRefId($refId)
    {
        $this->refId = $refId;

        return $this;
    }

    /**
     * Get refId
     *
     * @return guid 
     */
    public function getRefId()
    {
        return $this->refId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Attributes
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Attributes
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set valueSTR64
     *
     * @param string $valueSTR64
     * @return Attributes
     */
    public function setValueSTR64($valueSTR64)
    {
        $this->valueSTR64 = $valueSTR64;

        return $this;
    }

    /**
     * Get valueSTR64
     *
     * @return string 
     */
    public function getValueSTR64()
    {
        return $this->valueSTR64;
    }

    /**
     * Set valueSTR255
     *
     * @param string $valueSTR255
     * @return Attributes
     */
    public function setValueSTR255($valueSTR255)
    {
        $this->valueSTR255 = $valueSTR255;

        return $this;
    }

    /**
     * Get valueSTR255
     *
     * @return string 
     */
    public function getValueSTR255()
    {
        return $this->valueSTR255;
    }

    /**
     * Set valueTEXT
     *
     * @param string $valueTEXT
     * @return Attributes
     */
    public function setValueTEXT($valueTEXT)
    {
        $this->valueTEXT = $valueTEXT;

        return $this;
    }

    /**
     * Get valueTEXT
     *
     * @return string 
     */
    public function getValueTEXT()
    {
        return $this->valueTEXT;
    }

    /**
     * Set valueBOOL
     *
     * @param boolean $valueBOOL
     * @return Attributes
     */
    public function setValueBOOL($valueBOOL)
    {
        $this->valueBOOL = $valueBOOL;

        return $this;
    }

    /**
     * Get valueBOOL
     *
     * @return boolean 
     */
    public function getValueBOOL()
    {
        return $this->valueBOOL;
    }

    /**
     * Set valueINT
     *
     * @param integer $valueINT
     * @return Attributes
     */
    public function setValueINT($valueINT)
    {
        $this->valueINT = $valueINT;

        return $this;
    }

    /**
     * Get valueINT
     *
     * @return integer 
     */
    public function getValueINT()
    {
        return $this->valueINT;
    }

    /**
     * Set valueDEC
     *
     * @param float $valueDEC
     * @return Attributes
     */
    public function setValueDEC($valueDEC)
    {
        $this->valueDEC = $valueDEC;

        return $this;
    }

    /**
     * Get valueDEC
     *
     * @return float 
     */
    public function getValueDEC()
    {
        return $this->valueDEC;
    }

    /**
     * Set valueDATE
     *
     * @param \DateTime $valueDATE
     * @return Attributes
     */
    public function setValueDATE($valueDATE)
    {
        $this->valueDATE = $valueDATE;

        return $this;
    }

    /**
     * Get valueDATE
     *
     * @return \DateTime 
     */
    public function getValueDATE()
    {
        return $this->valueDATE;
    }

    /**
     * Set valueKEY
     *
     * @param guid $valueKEY
     * @return Attributes
     */
    public function setValueKEY($valueKEY)
    {
        $this->valueKEY = $valueKEY;

        return $this;
    }

    /**
     * Get valueKEY
     *
     * @return guid 
     */
    public function getValueKEY()
    {
        return $this->valueKEY;
    }
}
