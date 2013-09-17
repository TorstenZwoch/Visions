<?php

namespace Visions\DocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Content
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Visions\DocBundle\Entity\ContentRepository")
 */
class Content {

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
     * @ORM\Column(name="modifyUser", type="guid", nullable=true)
     */
    private $modifyUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifyDate", type="datetimetz", nullable=true)
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
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255, nullable=true)
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=3)
     */
    private $language;

    /**
     * @var integer
     * @example 0=MarkDown, 1=HTML , 2=DocBook ...
     * @ORM\Column(name="format", type="integer")
     */
    private $format;

    /**
     * @var boolean
     *
     * @ORM\Column(name="online", type="boolean")
     */
    private $online;

    /**
     * Constructor
     */
    public function __construct() {
        $this->creationDate = new \DateTime();
        $this->modifyDate = new \DateTime();
        $this->language = "ger";    //default: germany
        $this->format = 0;          //default: MarkDown, 
        $this->online = false;      //default: offline
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set creationUser
     *
     * @param guid $creationUser
     * @return Content
     */
    public function setCreationUser($creationUser) {
        $this->creationUser = $creationUser;

        return $this;
    }

    /**
     * Get creationUser
     *
     * @return guid 
     */
    public function getCreationUser() {
        return $this->creationUser;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Content
     */
    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate() {
        return $this->creationDate;
    }

    /**
     * Set modifyUser
     *
     * @param guid $modifyUser
     * @return Content
     */
    public function setModifyUser($modifyUser) {
        $this->modifyUser = $modifyUser;

        return $this;
    }

    /**
     * Get modifyUser
     *
     * @return guid 
     */
    public function getModifyUser() {
        return $this->modifyUser;
    }

    /**
     * Set modifyDate
     *
     * @param \DateTime $modifyDate
     * @return Content
     */
    public function setModifyDate($modifyDate) {
        $this->modifyDate = $modifyDate;

        return $this;
    }

    /**
     * Get modifyDate
     *
     * @return \DateTime 
     */
    public function getModifyDate() {
        return $this->modifyDate;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Content
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Content
     */
    public function setText($text) {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText() {
        return $this->text;
    }

    /**
     * Set tags
     *
     * @param string $tags
     * @return Content
     */
    public function setTags($tags) {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags() {
        return $this->tags;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Content
     */
    public function setLanguage($language) {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage() {
        return $this->language;
    }

    /**
     * Set format
     *
     * @param integer $format
     * @return Content
     */
    public function setFormat($format) {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return integer 
     */
    public function getFormat() {
        return $this->format;
    }

    /**
     * Set online
     *
     * @param boolean $online
     * @return Content
     */
    public function setOnline($online) {
        $this->online = $online;

        return $this;
    }

    /**
     * Get online
     *
     * @return boolean 
     */
    public function getOnline() {
        return $this->online;
    }

}
