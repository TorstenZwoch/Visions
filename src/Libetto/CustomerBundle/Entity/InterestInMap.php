<?php

namespace Libetto\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * InterestInMap
 *
 * @ORM\Table(name="tInterestInMap")
 * @ORM\Entity(repositoryClass="Libetto\CustomerBundle\Entity\InterestInMapRepository")
 */
class InterestInMap extends BASE
{

    /**
     * @var guid
     *
     * @ORM\Column(name="rContact", type="guid")
     */
    private $rContact;

    /**
     * @var guid
     *
     * @ORM\Column(name="rInterestIn", type="guid")
     */
    private $rInterestIn;


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
     * Set rContact
     *
     * @param guid $rContact
     * @return InterestInMap
     */
    public function setRContact($rContact)
    {
        $this->rContact = $rContact;
    
        return $this;
    }

    /**
     * Get rContact
     *
     * @return guid 
     */
    public function getRContact()
    {
        return $this->rContact;
    }

    /**
     * Set rInterestIn
     *
     * @param guid $rInterestIn
     * @return InterestInMap
     */
    public function setRInterestIn($rInterestIn)
    {
        $this->rInterestIn = $rInterestIn;
    
        return $this;
    }

    /**
     * Get rInterestIn
     *
     * @return guid 
     */
    public function getRInterestIn()
    {
        return $this->rInterestIn;
    }
}
