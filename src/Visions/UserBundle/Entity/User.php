<?php

namespace Visions\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Column(type="guid", nullable=false, length=36)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", nullable=true, length=255)
     * 
     * @Assert\NotBlank(message="Please enter your Redmine API key", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max="255",
     *     minMessage="The key is too short.",
     *     maxMessage="The key is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $redmineAPIKey;   
    
    /**
     * @ORM\Column(type="string", nullable=true, length=255)
     * 
     * @Assert\NotBlank(message="Please enter your Redmine API Url.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max="255",
     *     minMessage="The url is too short.",
     *     maxMessage="The url is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $redmineAPIUrl;   
    
    /**
     * @ORM\Column(type="integer", nullable=true, length=6)
     * 
     * @Assert\NotBlank(message="Please enter your Redmine API Port.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=1,
     *     max="6",
     *     minMessage="The port is too short.",
     *     maxMessage="The port is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $redmineAPIPort;     

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    public function __toString() {
        return $this->getUsername();
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
     * Set redmineAPIKey
     *
     * @param string $redmineAPIKey
     * @return User
     */
    public function setRedmineAPIKey($redmineAPIKey)
    {
        $this->redmineAPIKey = $redmineAPIKey;
    
        return $this;
    }

    /**
     * Get redmineAPIKey
     *
     * @return string 
     */
    public function getRedmineAPIKey()
    {
        return $this->redmineAPIKey;
    }
    
   /**
     * Set redmineAPIUrl
     *
     * @param string $redmineAPIUrl
     * @return User
     */
    public function setRedmineAPIUrl($redmineAPIPUrl)
    {
        $this->redmineAPIUrl = $redmineAPIPUrl;
    
        return $this;
    }

    /**
     * Get redmineAPIUrl
     *
     * @return string 
     */
    public function getRedmineAPIUrl()
    {
        return $this->redmineAPIUrl;
    }
    
   /**
     * Set redmineAPIPort
     *
     * @param integer $redmineAPIPort
     * @return User
     */
    public function setRedmineAPIPort($redmineAPIPort)
    {
        $this->redmineAPIPort = $redmineAPIPort;
    
        return $this;
    }

    /**
     * Get redmineAPIPort
     *
     * @return integer 
     */
    public function getRedmineAPIPort()
    {
        return $this->redmineAPIPort;
    }    
}