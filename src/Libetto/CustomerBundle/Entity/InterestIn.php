<?php

namespace Libetto\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * InterestIn
 *
 * @ORM\Table(name="tInterestIn")
 * @ORM\Entity(repositoryClass="Libetto\CustomerBundle\Entity\InterestInRepository")
 */
class InterestIn extends BASE
{

    /**
     * @var string
     *
     * @ORM\Column(name="cTitle", type="string", length=255)
     */
    private $cTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="cDescription", type="text")
     */
    private $cDescription;


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
     * Set cTitle
     *
     * @param string $cTitle
     * @return InterestIn
     */
    public function setCTitle($cTitle)
    {
        $this->cTitle = $cTitle;
    
        return $this;
    }

    /**
     * Get cTitle
     *
     * @return string 
     */
    public function getCTitle()
    {
        return $this->cTitle;
    }

    /**
     * Set cDescription
     *
     * @param string $cDescription
     * @return InterestIn
     */
    public function setCDescription($cDescription)
    {
        $this->cDescription = $cDescription;
    
        return $this;
    }

    /**
     * Get cDescription
     *
     * @return string 
     */
    public function getCDescription()
    {
        return $this->cDescription;
    }
}
