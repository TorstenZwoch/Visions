<?php

namespace Visions\VisionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="Visions\VisionBundle\Entity\ProjectRepository")
 */
class Project
{
    /**
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="decription", type="text")
     */
    private $decription;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="text")
     */
    private $tags;

    /**
     * @var guid
     *
     * @ORM\Column(name="category", type="guid")
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255)
     */
    private $website;

    /**
     * @var boolean
     *
     * @ORM\Column(name="public", type="boolean")
     */
    private $public;

    /**
     * @var string
     *
     * @ORM\Column(name="sharedWith", type="text")
     */
    private $sharedWith;


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
     * Set creationUser
     *
     * @param guid $creationUser
     * @return Project
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
     * @return Project
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
     * @return Project
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
     * @return Project
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
     * @return Project
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
     * Set title
     *
     * @param string $title
     * @return Project
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
     * Set decription
     *
     * @param string $decription
     * @return Project
     */
    public function setDecription($decription)
    {
        $this->decription = $decription;

        return $this;
    }

    /**
     * Get decription
     *
     * @return string 
     */
    public function getDecription()
    {
        return $this->decription;
    }

    /**
     * Set tags
     *
     * @param string $tags
     * @return Project
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
     * Set category
     *
     * @param guid $category
     * @return Project
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return guid 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Project
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set public
     *
     * @param boolean $public
     * @return Project
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Get public
     *
     * @return boolean 
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Set sharedWith
     *
     * @param string $sharedWith
     * @return Project
     */
    public function setSharedWith($sharedWith)
    {
        $this->sharedWith = $sharedWith;

        return $this;
    }

    /**
     * Get sharedWith
     *
     * @return string 
     */
    public function getSharedWith()
    {
        return $this->sharedWith;
    }
}
