<?php

namespace Visions\DocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Document
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Visions\DocBundle\Entity\DocumentRepository")
 */
class Document
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
     * @var string
     *
     * @ORM\Column(name="header", type="text")
     */
    private $header;

    /**
     * @var string
     *
     * @ORM\Column(name="footer", type="text")
     */
    private $footer;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255)
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="internalId", type="string", length=255)
     */
    private $internalId;

    /**
     * @var guid
     *
     * @ORM\Column(name="templateId", type="guid")
     */
    private $templateId;


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
     * @return Document
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
     * @return Document
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
     * @return Document
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
     * @return Document
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
     * Set title
     *
     * @param string $title
     * @return Document
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
     * @return Document
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
     * Set header
     *
     * @param string $header
     * @return Document
     */
    public function setHeader($header)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Get header
     *
     * @return string 
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Set footer
     *
     * @param string $footer
     * @return Document
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * Get footer
     *
     * @return string 
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * Set tags
     *
     * @param string $tags
     * @return Document
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
     * Set internalId
     *
     * @param string $internalId
     * @return Document
     */
    public function setInternalId($internalId)
    {
        $this->internalId = $internalId;

        return $this;
    }

    /**
     * Get internalId
     *
     * @return string 
     */
    public function getInternalId()
    {
        return $this->internalId;
    }

    /**
     * Set templateId
     *
     * @param guid $templateId
     * @return Document
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;

        return $this;
    }

    /**
     * Get templateId
     *
     * @return guid 
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }
}
