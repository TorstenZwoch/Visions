<?php

namespace Libetto\CoreBundle\Entity;

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
     * @ORM\Column(type="guid", nullable=false, length=36, name="cId")
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
    private $cComp;

    /**
     * Erstelldatum
     * Mandant / Frima
     * @ORM\Column(type="datetime")
     */
    private $cCreationDate;

    /**
     * Änderungsdatum
     * @ORM\Column(type="datetime")
     */
    private $cModifyDate;

    /**
     * Erstell-Benutzer
     * @ORM\Column(type="guid", nullable=false, length=36)
     * 
     */
    private $cCreationUser;

    /**
     * Änderungs-Benutzer
     * @ORM\Column(type="guid", nullable=false, length=36)
     */
    private $cModifyUser;

    /**
     * Löschkennzeichen
     * @ORM\Column(type="boolean", nullable=false, options={"default":false} )
     */
    private $isDeleted;
    

    /**
     * 
     */
    public function __construct() {
        $this->setCCreationDate(new \DateTime());
        $this->setCModifyDate(new \DateTime());
        $this->setIsDeleted(false);
        $this->setCClient("");
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue() {
        global $kernel;
        $user = $kernel->getContainer()->get('security.context')->getToken()->getUser();
        $this->setCModifyUser($user->getId());
        $this->setCModifyDate(new \DateTime());
        $this->setCComp("sus");
        $this->setIsDeleted(false);
    }

    /**
     * @ORM\PrePersist
     */
    public function setPersistValue() {
 
        global $kernel;
        $user = $kernel->getContainer()->get('security.context')->getToken()->getUser();
        $this->setCCreationUser($user->getId());
        $this->setCModifyUser($user->getId());
        $this->setCCreationDate(new \DateTime());
        $this->setCModifyDate(new \DateTime());
        $this->setCComp("sus");
        $this->setIsDeleted(false);
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
     * Set cComp
     *
     * @param guid $cComp
     * @return BaseTable
     */
    public function setCComp($cComp) {
        $this->cComp = $cComp;

        return $this;
    }

    /**
     * Get cComp
     *
     * @return guid 
     */
    public function getCComp() {
        return $this->cComp;
    }

    /**
     * Set cCreationDate
     *
     * @param datetimetz  $cCreationDate
     * @return BaseTable
     */
    public function setCCreationDate($cCreationDate) {
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
     * Set cModifyDate
     *
     * @param datetimetz $cModifyDate
     * @return BaseTable
     */
    public function setCModifyDate($cModifyDate) {
        $this->cModifyDate = $cModifyDate;

        return $this;
    }

    /**
     * Get cModifyDate
     *
     * @return datetimetz 
     */
    public function getCModifyDate() {
        return $this->cModifyDate;
    }

    /**
     * Set cCreationUser
     *
     * @param guid $cCreationUser
     * @return BaseTable
     */
    public function setCCreationUser($cCreationUser) {
        $this->cCreationUser = $cCreationUser;

        return $this;
    }

    /**
     * Get cCreationUser
     *
     * @return guid 
     */
    public function getCCreationUser() {
        return $this->cCreationUser;
    }

    /**
     * Set cModifyUser
     *
     * @param guid $cModifyUser
     * @return BaseTable
     */
    public function setCModifyUser($cModifyUser) {
        $this->cModifyUser = $cModifyUser;

        return $this;
    }

    /**
     * Get cModifyUser
     *
     * @return guid 
     */
    public function getCModifyUser() {
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

}
