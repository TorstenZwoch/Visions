<?php

namespace Libetto\MaintenanceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Master
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Libetto\MaintenanceBundle\Entity\MasterRepository")
 */
class Master //extends \Libetto\CoreBundle\Entity\BaseTable
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
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tablename", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "3",
     *      max = "255",
     *      minMessage="Your name must have at least {{ limit }} characters."
     * )
     */
    private $tablename;

    /**
     * @var string
     *
     * @ORM\Column(name="fieldname", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $fieldname;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="string", length=64)
     * @Assert\NotBlank()
     * 
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="isindex", type="boolean")
     */
    private $isindex;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isunique", type="boolean")
     */
    private $isunique;

    /**
     * @var integer
     *
     * @ORM\Column(name="orderid", type="integer")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "1",
     *      max = "255"
     * )
     */
    private $orderid;

    

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
     * Set id
     *
     * @param guid $id
     * @return Master
     */
    public function setId($id)
    {
        if($id!=null && $id!=""){
            $this->id = $id;
        }
    }

    /**
     * Set tablename
     *
     * @param string $tablename
     * @return Master
     */
    public function setTablename($tablename)
    {
        $this->tablename = $tablename;

        return $this;
    }

    /**
     * Get tablename
     *
     * @return string 
     */
    public function getTablename()
    {
        return $this->tablename;
    }

    /**
     * Set fieldname
     *
     * @param string $fieldname
     * @return Master
     */
    public function setFieldname($fieldname)
    {
        $this->fieldname = $fieldname;

        return $this;
    }

    /**
     * Get fieldname
     *
     * @return string 
     */
    public function getFieldname()
    {
        return $this->fieldname;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Master
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set isindex
     *
     * @param integer $isindex
     * @return Master
     */
    public function setIsindex($isindex)
    {
        $this->isindex = $isindex;

        return $this;
    }

    /**
     * Get isindex
     *
     * @return integer 
     */
    public function getIsindex()
    {
        return $this->isindex;
    }

    /**
     * Set isunique
     *
     * @param boolean $isunique
     * @return Master
     */
    public function setIsunique($isunique)
    {
        $this->isunique = $isunique;

        return $this;
    }

    /**
     * Get isunique
     *
     * @return boolean 
     */
    public function getIsunique()
    {
        return $this->isunique;
    }

    /**
     * Set orderid
     *
     * @param integer $orderid
     * @return Master
     */
    public function setOrderid($orderid)
    {
        $this->orderid = $orderid;

        return $this;
    }

    /**
     * Get orderid
     *
     * @return integer 
     */
    public function getOrderid()
    {
        return $this->orderid;
    }
    
    
    
}
