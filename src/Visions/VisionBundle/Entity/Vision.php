<?php

namespace Visions\VisionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vision
 *
 * @ORM\Table(name="vision")
 * @ORM\Entity(repositoryClass="Visions\VisionBundle\Entity\VisionRepository")
 */
class Vision
{
    /**
     * @var integer
     *
     * @ORM\Column(type="guid", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @var guid
     *
     * @ORM\Column(name="creationUser", type="guid")
     */
    private $creationUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetimetz")
     */
    private $creationDate;

    /**
     * @var guid
     *
     * @ORM\Column(name="modifyUser", type="guid")
     */
    private $modifyUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifyDate", type="datetimetz")
     */
    private $modifyDate;

    /**
     * @var guid
     *
     * @ORM\Column(name="parentId", type="guid")
     */
    private $parentId;

    /**
     * @var guid
     *
     * @ORM\Column(name="projectId", type="guid")
     */
    private $projectId;

    /**
     * @var string
     *
     * @ORM\Column(name="externalId", type="string", length=255)
     */
    private $externalId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var guid
     *
     * @ORM\Column(name="type", type="guid")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="text")
     */
    private $tags;

    /**
     * @var integer
     *
     * @ORM\Column(name="fan", type="integer")
     */
    private $fan;


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
     * Set creationUser
     *
     * @param guid $creationUser
     * @return Vision
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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Vision
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
     * Set modifyUser
     *
     * @param guid $modifyUser
     * @return Vision
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
     * Set modifyDate
     *
     * @param \DateTime $modifyDate
     * @return Vision
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
     * Set parentId
     *
     * @param guid $parentId
     * @return Vision
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return guid 
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set projectId
     *
     * @param guid $projectId
     * @return Vision
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * Get projectId
     *
     * @return guid 
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set externalId
     *
     * @param string $externalId
     * @return Vision
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * Get externalId
     *
     * @return string 
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Vision
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Vision
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param guid $type
     * @return Vision
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return guid 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set tags
     *
     * @param string $tags
     * @return Vision
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set fan
     *
     * @param integer $fan
     * @return Vision
     */
    public function setFan($fan)
    {
        $this->fan = $fan;

        return $this;
    }

    /**
     * Get fan
     *
     * @return integer 
     */
    public function getFan()
    {
        return $this->fan;
    }
}
