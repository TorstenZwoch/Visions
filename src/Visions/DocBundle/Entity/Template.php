<?php

namespace Visions\DocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Template
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Visions\DocBundle\Entity\TemplateRepository")
 */
class Template
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
     * @ORM\Column(name="css", type="text")
     */
    private $css;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;


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
     * @return Template
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
     * @return Template
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
     * @return Template
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
     * @return Template
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
     * @return Template
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
     * Set header
     *
     * @param string $header
     * @return Template
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
     * @return Template
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
     * Set css
     *
     * @param string $css
     * @return Template
     */
    public function setCss($css)
    {
        $this->css = $css;

        return $this;
    }

    /**
     * Get css
     *
     * @return string 
     */
    public function getCss()
    {
        return $this->css;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Template
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }
}
