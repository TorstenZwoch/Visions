<?php

namespace Libetto\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * cCompany
 * @ORM\Entity()
 * @ORM\Table(name="tCompany")
 */
class Company extends BASE
{

    /**
     * @var string
     *
     * @ORM\Column(name="cName", type="string", length=255)
     */
    private $cName;

    /**
     * @var string
     *
     * @ORM\Column(name="cEMail", type="string", length=255)
     */
    private $cEMail;

    /**
     * @var guid
     *
     * @ORM\Column(name="rCompandy", type="guid")
     */
    private $rCompandy;



    /**
     * Set cName
     *
     * @param string $cName
     * @return cCompany
     */
    public function setCName($cName)
    {
        $this->cName = $cName;

        return $this;
    }

    /**
     * Get cName
     *
     * @return string 
     */
    public function getCName()
    {
        return $this->cName;
    }

    /**
     * Set cEMail
     *
     * @param string $cEMail
     * @return cCompany
     */
    public function setCEMail($cEMail)
    {
        $this->cEMail = $cEMail;

        return $this;
    }

    /**
     * Get cEMail
     *
     * @return string 
     */
    public function getCEMail()
    {
        return $this->cEMail;
    }

    /**
     * Set rCompandy
     *
     * @param guid $rCompandy
     * @return cCompany
     */
    public function setRCompandy($rCompandy)
    {
        $this->rCompandy = $rCompandy;

        return $this;
    }

    /**
     * Get rCompandy
     *
     * @return guid 
     */
    public function getRCompandy()
    {
        return $this->rCompandy;
    }
}
