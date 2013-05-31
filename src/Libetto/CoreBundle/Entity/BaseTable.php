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
    private $id;

    
     /**
     * @ORM\Column(type="guid", nullable=false, length=36)
     * 
     */
    private $client;

    
    /**
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $modifyDate;
    
     
    /**
     * @ORM\Column(type="guid", nullable=false, length=36)
     * 
     */
    private $creationUser;

    /**
     * @ORM\Column(type="guid", nullable=false, length=36)
     */
    private $modifyUser;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDeleted;
    
    
     public function __construct() {
        $this->setCreationDate(new \DateTime());
        $this->setModifyDate(new \DateTime());
        $this->setIsDeleted(false);
        $this->setClient("");
        $this->setModifyUser("");
        $this->setCreationUser("");
    }
    
    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue() {
        $this->setModifyDate(new \DateTime());
    }


    /**
     * Get id
     *
     * @return guid 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set client
     *
     * @param guid $client
     * @return BaseTable
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return guid 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return BaseTable
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set modifyDate
     *
     * @param \DateTime $modifyDate
     * @return BaseTable
     */
    public function setModifyDate($modifyDate)
    {
        $this->modifyDate = $modifyDate;

        return $this;
    }

    /**
     * Get modifyDate
     *
     * @return \DateTime 
     */
    public function getModifyDate()
    {
        return $this->modifyDate;
    }

    /**
     * Set creationUser
     *
     * @param guid $creationUser
     * @return BaseTable
     */
    public function setCreationUser($creationUser)
    {
        $this->creationUser = $creationUser;

        return $this;
    }

    /**
     * Get creationUser
     *
     * @return guid 
     */
    public function getCreationUser()
    {
        return $this->creationUser;
    }

    /**
     * Set modifyUser
     *
     * @param guid $modifyUser
     * @return BaseTable
     */
    public function setModifyUser($modifyUser)
    {
        $this->modifyUser = $modifyUser;

        return $this;
    }

    /**
     * Get modifyUser
     *
     * @return guid 
     */
    public function getModifyUser()
    {
        return $this->modifyUser;
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
