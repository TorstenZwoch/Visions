<?php

namespace Libetto\ItemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * Media
 *
 * @ORM\Table(name="tMedia")
 * @ORM\Entity(repositoryClass="Libetto\ItemBundle\Entity\MediaRepository")
 */
class Media extends BASE {

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="medias")
     * @ORM\JoinColumn(name="rRefId", referencedColumnName="cId")
     */
    protected $product;

    /**
     * @var guid
     *
     * @ORM\Column(name="rRefId", type="guid")
     */
    private $rRefId;

    /**
     * @var string
     *
     * @ORM\Column(name="cPath", type="string", length=255)
     */
    private $cPath;

    /**
     * @var string
     *
     * @ORM\Column(name="cType", type="string", length=64)
     */
    private $cType;

    /**
     * @var string
     *
     * @ORM\Column(name="cText", type="string", length=255)
     */
    private $cText;

    /**
     * Set rRefId
     *
     * @param guid $rRefId
     * @return Media
     */
    public function setRRefId($rRefId) {
        $this->rRefId = $rRefId;

        return $this;
    }

    /**
     * Get rRefId
     *
     * @return guid 
     */
    public function getRRefId() {
        return $this->rRefId;
    }

    /**
     * Set cPath
     *
     * @param string $cPath
     * @return Media
     */
    public function setCPath($cPath) {
        $this->cPath = $cPath;

        return $this;
    }

    /**
     * Get cPath
     *
     * @return string 
     */
    public function getCPath() {
        return $this->cPath;
    }

    /**
     * Set cType
     *
     * @param string $cType
     * @return Media
     */
    public function setCType($cType) {
        $this->cType = $cType;

        return $this;
    }

    /**
     * Get cType
     *
     * @return string 
     */
    public function getCType() {
        return $this->cType;
    }

    /**
     * Set cText
     *
     * @param string $cText
     * @return Media
     */
    public function setCText($cText) {
        $this->cText = $cText;

        return $this;
    }

    /**
     * Get cText
     *
     * @return string 
     */
    public function getCText() {
        return $this->cText;
    }


    /**
     * Set product
     *
     * @param \Libetto\ItemBundle\Entity\Product $product
     * @return Media
     */
    public function setProduct(\Libetto\ItemBundle\Entity\Product $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \Libetto\ItemBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}