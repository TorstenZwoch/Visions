<?php

namespace Libetto\ItemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * ProductText
 *
 * @ORM\Table(name="tProductText")
 * @ORM\Entity(repositoryClass="Libetto\ItemBundle\Entity\ProductTextRepository")
 */
class ProductText extends BASE {

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="productTexts")
     * @ORM\JoinColumn(name="rProduct", referencedColumnName="cId")
     */
    private $product;

    /**
     * @var guid
     *
     * @ORM\Column(name="rProduct", type="guid")
     */
    private $rProduct;

    /**
     * @var string
     *
     * @ORM\Column(name="cLanguage", type="string", length=32)
     */
    private $cLanguage;

    /**
     * @var string
     *
     * @ORM\Column(name="cName", type="string", length=255)
     */
    private $cName;

    /**
     * @var string
     *
     * @ORM\Column(name="cShortName", type="string", length=64)
     */
    private $cShortName;

    /**
     * @var string
     *
     * @ORM\Column(name="cDescription", type="text")
     */
    private $cDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="cDescriptionType", type="string", length=64)
     */
    private $cDescriptionType;

    /**
     * Set rProduct
     *
     * @param guid $rProduct
     * @return ProductText
     */
    public function setRProduct($rProduct) {
        $this->rProduct = $rProduct;

        return $this;
    }

    /**
     * Get rProduct
     *
     * @return guid 
     */
    public function getRProduct() {
        return $this->rProduct;
    }

    /**
     * Set cLanguage
     *
     * @param string $cLanguage
     * @return ProductText
     */
    public function setCLanguage($cLanguage) {
        $this->cLanguage = $cLanguage;

        return $this;
    }

    /**
     * Get cLanguage
     *
     * @return string 
     */
    public function getCLanguage() {
        return $this->cLanguage;
    }

    /**
     * Set cName
     *
     * @param string $cName
     * @return ProductText
     */
    public function setCName($cName) {
        $this->cName = $cName;

        return $this;
    }

    /**
     * Get cName
     *
     * @return string 
     */
    public function getCName() {
        return $this->cName;
    }

    /**
     * Set cShortName
     *
     * @param string $cShortName
     * @return ProductText
     */
    public function setCShortName($cShortName) {
        $this->cShortName = $cShortName;

        return $this;
    }

    /**
     * Get cShortName
     *
     * @return string 
     */
    public function getCShortName() {
        return $this->cShortName;
    }

    /**
     * Set cDescription
     *
     * @param string $cDescription
     * @return ProductText
     */
    public function setCDescription($cDescription) {
        $this->cDescription = $cDescription;

        return $this;
    }

    /**
     * Get cDescription
     *
     * @return string 
     */
    public function getCDescription() {
        return $this->cDescription;
    }

    /**
     * Set cDescriptionType
     *
     * @param string $cDescriptionType
     * @return ProductText
     */
    public function setCDescriptionType($cDescriptionType) {
        $this->cDescriptionType = $cDescriptionType;

        return $this;
    }

    /**
     * Get cDescriptionType
     *
     * @return string 
     */
    public function getCDescriptionType() {
        return $this->cDescriptionType;
    }


    /**
     * Set product
     *
     * @param \Libetto\ItemBundle\Entity\Product $product
     * @return ProductText
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