<?php
namespace Libetto\MaintenanceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * tMaster
 *
 * @ORM\Table(name="tMaster")
 * @ORM\Entity(repositoryClass="Libetto\MaintenanceBundle\Entity\MasterRepository")
 */
class Master
{
    /**
     *
     * @var type Datentypen 
     */
    public static $sqlDataTypes = array("STR64" => "STRING64",
                                        "STR255" => "STRING255",
                                        "TEXT" => "TEXT",
                                        "BOOL" => "BOOLEAN",
                                        "INT" => "INTEGER",
                                        "DEC" => "DECIMAL",
                                        "DATE" => "DATETIME",
                                        "KEY" => "KEY");
    
    
    
  /**
     * @ORM\Column(type="guid", nullable=false, length=36)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * 
     */
    private $cId;

    /**
     * @var string
     *
     * @ORM\Column(name="cTableName", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "3",
     *      max = "255",
     *      minMessage="Your name must have at least {{ limit }} characters."
     * )
     */
    private $cTableName;

    /**
     * @var string
     *
     * @ORM\Column(name="cFieldName", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $cFieldName;

    /**
     * @var integer
     *
     * @ORM\Column(name="cType", type="string", length=64)
     * @Assert\NotBlank()
     * 
     */
    private $cType;

    /**
     * @var integer
     *
     * @ORM\Column(name="cIsIndex", type="boolean")
     */
    private $cIsIndex;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tIsUnique", type="boolean")
     */
    private $cIsUnique;

    /**
     * @var integer
     *
     * @ORM\Column(name="cOrderId", type="integer")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "1",
     *      max = "255"
     * )
     */
    private $cOrderId;


    /**
     * Get cId
     *
     * @return guid 
     */
    public function getCId()
    {
        return $this->cId;
    }
    
     /**
     * Set id
     *
     * @param guid $id
     * @return Master
     */
    public function setCId($id)
    {
        #if($id!=null && $id!=""){
            $this->cId = $id;
        #}
    }

    /**
     * Set cTableName
     *
     * @param string $cTableName
     * @return Master
     */
    public function setCTableName($cTableName)
    {
        $this->cTableName = strtolower($cTableName);

        return $this;
    }

    /**
     * Get cTableName
     *
     * @return string 
     */
    public function getCTableName()
    {
        return $this->cTableName;
    }

    /**
     * Set cFieldName
     *
     * @param string $cFieldName
     * @return Master
     */
    public function setCFieldName($cFieldName)
    {
        $this->cFieldName = $cFieldName;

        return $this;
    }

    /**
     * Get cFieldName
     *
     * @return string 
     */
    public function getCFieldName()
    {
        return $this->cFieldName;
    }

    /**
     * Set cType
     *
     * @param string $cType
     * @return Master
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
     * Set cIsIndex
     *
     * @param boolean $cIsIndex
     * @return Master
     */
    public function setCIsIndex($cIsIndex)
    {
        $this->cIsIndex = $cIsIndex;

        return $this;
    }

    /**
     * Get cIsIndex
     *
     * @return boolean 
     */
    public function getCIsIndex()
    {
        return $this->cIsIndex;
    }

    /**
     * Set cIsUnique
     *
     * @param boolean $cIsUnique
     * @return Master
     */
    public function setCIsUnique($cIsUnique)
    {
        $this->cIsUnique = $cIsUnique;

        return $this;
    }

    /**
     * Get cIsUnique
     *
     * @return boolean 
     */
    public function getCIsUnique()
    {
        return $this->cIsUnique;
    }

    /**
     * Set cOrderId
     *
     * @param integer $cOrderId
     * @return Master
     */
    public function setCOrderId($cOrderId)
    {
        $this->cOrderId = $cOrderId;

        return $this;
    }

    /**
     * Get cOrderId
     *
     * @return integer 
     */
    public function getCOrderId()
    {
        return $this->cOrderId;
    }
   
}
