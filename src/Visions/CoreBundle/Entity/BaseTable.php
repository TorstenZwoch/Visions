<?php

namespace Visions\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BaseTable
 *
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks 
 * 
 */
abstract class BaseTable {

    /**
     * Allgemeine UID
     * @ORM\Column(type="guid", nullable=false, length=36, name="id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * 
     */
    private $id;

    /**
     * Company/Client ID
     * @ORM\Column(type="guid", nullable=false, length=36)
     * 
     */
    private $comp;

    /**
     * Erstelldatum
     * Mandant / Frima
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    /**
     * Änderungsdatum
     * @ORM\Column(type="datetime")
     */
    private $modifyDate;

    /**
     * Erstell-Benutzer
     * @ORM\Column(type="guid", nullable=false, length=36)
     * 
     */
    private $creationUser;

    /**
     * Änderungs-Benutzer
     * @ORM\Column(type="guid", nullable=false, length=36)
     */
    private $modifyUser;

    /**
     * Löschkennzeichen
     * @ORM\Column(type="boolean", nullable=false, options={"default":false} )
     */
    private $isDeleted;

    /**
     * Konstruktor der BASE Klasse
     */
    public function __construct() {
        $this->setIsDeleted(false);
        $this->setComp("Visions");
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue() {
        $userId = "Generated-Without-Login";
        global $kernel;
        $securityToken = $kernel->getContainer()->get('security.context')->getToken();
        if ($securityToken != null) {
            $user = $securityToken->getUser();
            if (get_class($user) == "Visions\UserBundle\Entity\User" && $user != null)
                $userId = $user->getId();
        }
        $this->setModifyUser($userId);
        $this->setModifyDate(new \DateTime());
    }

    /**
     * @ORM\PrePersist
     */
    public function setPersistValue() {
        $userId = "Generated-Without-Login";
        global $kernel;
        $securityToken = $kernel->getContainer()->get('security.context')->getToken();
        if ($securityToken != null) {
            $user = $securityToken->getUser();
            if (get_class($user) == "Visions\UserBundle\Entity\User" && $user != null)
                $userId = $user->getId();
        }
        $this->setCreationUser($userId);
        $this->setModifyUser($userId);
        $this->setCreationDate(new \DateTime());
        $this->setModifyDate(new \DateTime());
    }

    /**
     * Get id
     *
     * @return guid 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set comp
     *
     * @param guid $cComp
     * @return BaseTable
     */
    public function setComp($cComp) {
        $this->cComp = $cComp;

        return $this;
    }

    /**
     * Get comp
     *
     * @return guid 
     */
    public function getComp() {
        return $this->cComp;
    }

    /**
     * Set creationDate
     *
     * @param datetimetz  $cCreationDate
     * @return BaseTable
     */
    public function setCreationDate($cCreationDate) {
        $this->cCreationDate = $cCreationDate;

        return $this;
    }

    /**
     * Get cCreationDate
     *
     * @return datetimetz  
     */
    public function getCCreationDate() {
        return $this->cCreationDate;
    }

    /**
     * Set modifyDate
     *
     * @param datetimetz $cModifyDate
     * @return BaseTable
     */
    public function setModifyDate($cModifyDate) {
        $this->cModifyDate = $cModifyDate;

        return $this;
    }

    /**
     * Get modifyDate
     *
     * @return datetimetz 
     */
    public function getModifyDate() {
        return $this->cModifyDate;
    }

    /**
     * Set creationUser
     *
     * @param guid $cCreationUser
     * @return BaseTable
     */
    public function setCreationUser($cCreationUser) {
        $this->cCreationUser = $cCreationUser;

        return $this;
    }

    /**
     * Get creationUser
     *
     * @return guid 
     */
    public function getCreationUser() {
        return $this->cCreationUser;
    }

    /**
     * Set modifyUser
     *
     * @param guid $cModifyUser
     * @return BaseTable
     */
    public function setModifyUser($cModifyUser) {
        $this->cModifyUser = $cModifyUser;

        return $this;
    }

    /**
     * Get modifyUser
     *
     * @return guid 
     */
    public function getModifyUser() {
        return $this->cModifyUser;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     * @return BaseTable
     */
    public function setIsDeleted($isDeleted) {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean 
     */
    public function getIsDeleted() {
        return $this->isDeleted;
    }

//    private $creationUser;
//    private $modifyUser;
//
//    public function setCreationUser($user) {
//        $this->creationUser = $user;
//
//        $class = get_class($user);
//        if (get_class($user) == "Visions\UserBundle\Entity\User" && $user != null)
//            $this->setCCreationUser($user->getId());
//
//        return $this;
//    }
//
//    public function getCreationUser() {
//        if ($this->creationUser == null)
//            return $this->getCCreationUser();
//        return $this->creationUser;
//    }
//
//    public function setModifyUser($user) {
//        $this->modifyUser = $user;
//
//        if (get_class($user) == "Visions\UserBundle\Entity\User" && $user != null)
//            $this->setCModifyUser($user->getId());
//
//        return $this;
//    }
//
//    public function getModifyUser() {
//        if ($this->modifyUser == null)
//            return $this->getCModifyUser();
//        return $this->modifyUser;
//    }

}