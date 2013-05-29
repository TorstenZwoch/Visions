<?php

namespace Libetto\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 * 
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser {
    /**
     * @ORM\Column(type="guid", nullable=false, length=36)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    public function __construct() {
        parent::__construct();
        // your own logic
    }

    /**
     * Get id
     *
     * @return guid 
     */
    public function getId() {
        return $this->id;
    }

}
