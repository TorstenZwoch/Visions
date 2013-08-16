<?php

namespace Libetto\ItemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * Product
 *
 * @ORM\Table(name="tProduct")
 * @ORM\Entity(repositoryClass="Libetto\ItemBundle\Entity\ProductRepository")
 */
class Product extends BASE {

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="rCategory", referencedColumnName="cId")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="ProductGroup", inversedBy="products")
     * @ORM\JoinColumn(name="rProductGroup", referencedColumnName="cId")
     */
    private $productGroup;

    /**
     * @ORM\OneToMany(targetEntity="Media", mappedBy="product")
     */
    private $medias;

    /**
     * @ORM\OneToMany(targetEntity="ProductText", mappedBy="product")
     */
    private $productTexts;

    public function __construct() {
        parent::__construct();
        $this->medias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productTexts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return $this->getCNumber() . " - " . $this->getCName();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="cNumber", type="string", length=64)
     */
    private $cNumber;

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
     * @var guid
     *
     * @ORM\Column(name="rCategory", type="guid", nullable=false)
     */
    private $rCategory;

    /**
     * @var guid
     *
     * @ORM\Column(name="rProductGroup", type="guid", nullable=false)
     */
    private $rProductGroup;

    /**
     * Set cNumber
     *
     * @param string $cNumber
     * @return Product
     */
    public function setCNumber($cNumber) {
        $this->cNumber = $cNumber;

        return $this;
    }

    /**
     * Get cNumber
     *
     * @return string 
     */
    public function getCNumber() {
        return $this->cNumber;
    }

    /**
     * Set cName
     *
     * @param string $cName
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * Set rCategory
     *
     * @param guid $rCategory
     * @return Product
     */
    public function setRCategory($rCategory) {
        $this->rCategory = $rCategory;

        return $this;
    }

    /**
     * Get rCategory
     *
     * @return guid 
     */
    public function getRCategory() {
        return $this->rCategory;
    }

    /**
     * Set rProductGroup
     *
     * @param guid $rProductGroup
     * @return Product
     */
    public function setRProductGroup($rProductGroup) {
        $this->rProductGroup = $rProductGroup;

        return $this;
    }

    /**
     * Get rProductGroup
     *
     * @return guid 
     */
    public function getRProductGroup() {
        return $this->rProductGroup;
    }

    /**
     * Set category
     *
     * @param \Libetto\ItemBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\Libetto\ItemBundle\Entity\Category $category = null) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Libetto\ItemBundle\Entity\Category 
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * Set productGroup
     *
     * @param \Libetto\ItemBundle\Entity\ProductGroup $productGroup
     * @return Product
     */
    public function setProductGroup(\Libetto\ItemBundle\Entity\ProductGroup $productGroup = null) {
        $this->productGroup = $productGroup;

        return $this;
    }

    /**
     * Get productGroup
     *
     * @return \Libetto\ItemBundle\Entity\ProductGroup 
     */
    public function getProductGroup() {
        return $this->productGroup;
    }

    /**
     * Add medias
     *
     * @param \Libetto\ItemBundle\Entity\Media $medias
     * @return Product
     */
    public function addMedia(\Libetto\ItemBundle\Entity\Media $medias) {
        $this->medias[] = $medias;

        return $this;
    }

    /**
     * Remove medias
     *
     * @param \Libetto\ItemBundle\Entity\Media $medias
     */
    public function removeMedia(\Libetto\ItemBundle\Entity\Media $medias) {
        $this->medias->removeElement($medias);
    }

    /**
     * Get medias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMedias() {
        return $this->medias;
    }

    /**
     * Add productTexts
     *
     * @param \Libetto\ItemBundle\Entity\ProductText $productTexts
     * @return Product
     */
    public function addProductText(\Libetto\ItemBundle\Entity\ProductText $productTexts) {
        $this->productTexts[] = $productTexts;

        return $this;
    }

    /**
     * Remove productTexts
     *
     * @param \Libetto\ItemBundle\Entity\ProductText $productTexts
     */
    public function removeProductText(\Libetto\ItemBundle\Entity\ProductText $productTexts) {
        $this->productTexts->removeElement($productTexts);
    }

    /**
     * Get productTexts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductTexts() {
        return $this->productTexts;
    }

}