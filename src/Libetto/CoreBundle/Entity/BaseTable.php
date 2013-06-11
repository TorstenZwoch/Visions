<?php

namespace Libetto\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BaseTable
 *
 * @ORM\MappedSuperclass
 * 
 */
abstract class BaseTable
{
    /**
     * @ORM\Column(type="guid", nullable=false, length=36)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * 
     */
    private $cId;

    
     /**
     * Conpany/Client ID
     * @ORM\Column(type="guid", nullable=false, length=36)
     * 
     */
    private $cComp;

    
    /**
     * @ORM\Column(type="datetime")
     */
    private $cCreationDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $cModifyDate;
    
     
    /**
     * @ORM\Column(type="guid", nullable=false, length=36)
     * 
     */
    private $cCreationUser;

    /**
     * @ORM\Column(type="guid", nullable=false, length=36)
     */
    private $cModifyUser;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDeleted;
    
    
     public function __construct() {
        $this->setCCreationDate(new \DateTime());
        $this->setCModifyDate(new \DateTime());
        $this->setCIsDeleted(false);
        $this->setCClient("");
        $this->setCModifyUser("");
        $this->setCCreationUser("");
    }
    
    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue() {
        $this->setCModifyDate(new \DateTime());
    }


  

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
     * Set cComp
     *
     * @param guid $cComp
     * @return BaseTable
     */
    public function setCComp($cComp)
    {
        $this->cComp = $cComp;

        return $this;
    }

    /**
     * Get cComp
     *
     * @return guid 
     */
    public function getCComp()
    {
        return $this->cComp;
    }

    /**
     * Set cCreationDate
     *
     * @param \datetimetz  $cCreationDate
     * @return BaseTable
     */
    public function setCCreationDate(\datetimetz  $cCreationDate)
    {
        $this->cCreationDate = $cCreationDate;

        return $this;
    }

    /**
     * Get cCreationDate
     *
     * @return \datetimetz  
     */
    public function getCCreationDate()
    {
        return $this->cCreationDate;
    }

    /**
     * Set cModifyDate
     *
     * @param \DateTime $cModifyDate
     * @return BaseTable
     */
    public function setCModifyDate($cModifyDate)
    {
        $this->cModifyDate = $cModifyDate;

        return $this;
    }

    /**
     * Get cModifyDate
     *
     * @return \DateTime 
     */
    public function getCModifyDate()
    {
        return $this->cModifyDate;
    }

    /**
     * Set cCreationUser
     *
     * @param guid $cCreationUser
     * @return BaseTable
     */
    public function setCCreationUser($cCreationUser)
    {
        $this->cCreationUser = $cCreationUser;

        return $this;
    }

    /**
     * Get cCreationUser
     *
     * @return guid 
     */
    public function getCCreationUser()
    {
        return $this->cCreationUser;
    }

    /**
     * Set cModifyUser
     *
     * @param guid $cModifyUser
     * @return BaseTable
     */
    public function setCModifyUser($cModifyUser)
    {
        $this->cModifyUser = $cModifyUser;

        return $this;
    }

    /**
     * Get cModifyUser
     *
     * @return guid 
     */
    public function getCModifyUser()
    {
        return $this->cModifyUser;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     * @return BaseTable
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean 
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }
}
