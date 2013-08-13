<?php

namespace Libetto\ItemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * ProductGroup
 *
 * @ORM\Table(name="tProductGroup")
 * @ORM\Entity(repositoryClass="Libetto\ItemBundle\Entity\ProductGroupRepository")
 */
class ProductGroup extends BASE {

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="productGroup")
     */
    private $products;

    public function __construct() {
        parent::__construct();
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @var integer
     *
     * @ORM\Column(name="cSort", type="integer")
     */
    private $cSort;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cIsSalesDiscountable", type="boolean")
     */
    private $cIsSalesDiscountable;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cIsCashDiscountable", type="boolean")
     */
    private $cIsCashDiscountable;

    /**
     * @var guid
     *
     * @ORM\Column(name="rTaxId", type="guid", nullable=true)
     */
    private $rTaxId;

    /**
     * @var integer
     *
     * @ORM\Column(name="cDecimalPlacePrice", type="integer", nullable=true)
     */
    private $cDecimalPlacePrice;

    /**
     * @var integer
     *
     * @ORM\Column(name="cDecimalPlaceQuantity", type="integer", nullable=true)
     */
    private $cDecimalPlaceQuantity;

    /**
     * Set cNumber
     *
     * @param string $cNumber
     * @return ProductGroup
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
     * @return ProductGroup
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
     * Set cSort
     *
     * @param integer $cSort
     * @return ProductGroup
     */
    public function setCSort($cSort) {
        $this->cSort = $cSort;

        return $this;
    }

    /**
     * Get cSort
     *
     * @return integer 
     */
    public function getCSort() {
        return $this->cSort;
    }

    /**
     * Set cIsSalesDiscountable
     *
     * @param boolean $cIsSalesDiscountable
     * @return ProductGroup
     */
    public function setCIsSalesDiscountable($cIsSalesDiscountable) {
        $this->cIsSalesDiscountable = $cIsSalesDiscountable;

        return $this;
    }

    /**
     * Get cIsSalesDiscountable
     *
     * @return boolean 
     */
    public function getCIsSalesDiscountable() {
        return $this->cIsSalesDiscountable;
    }

    /**
     * Set cIsCashDiscountable
     *
     * @param boolean $cIsCashDiscountable
     * @return ProductGroup
     */
    public function setCIsCashDiscountable($cIsCashDiscountable) {
        $this->cIsCashDiscountable = $cIsCashDiscountable;

        return $this;
    }

    /**
     * Get cIsCashDiscountable
     *
     * @return boolean 
     */
    public function getCIsCashDiscountable() {
        return $this->cIsCashDiscountable;
    }

    /**
     * Set rTaxId
     *
     * @param guid $rTaxId
     * @return ProductGroup
     */
    public function setRTaxId($rTaxId) {
        $this->rTaxId = $rTaxId;

        return $this;
    }

    /**
     * Get rTaxId
     *
     * @return guid 
     */
    public function getRTaxId() {
        return $this->rTaxId;
    }

    /**
     * Set cDecimalPlacePrice
     *
     * @param integer $cDecimalPlacePrice
     * @return ProductGroup
     */
    public function setCDecimalPlacePrice($cDecimalPlacePrice) {
        $this->cDecimalPlacePrice = $cDecimalPlacePrice;

        return $this;
    }

    /**
     * Get cDecimalPlacePrice
     *
     * @return integer 
     */
    public function getCDecimalPlacePrice() {
        return $this->cDecimalPlacePrice;
    }

    /**
     * Set cDecimalPlaceQuantity
     *
     * @param integer $cDecimalPlaceQuantity
     * @return ProductGroup
     */
    public function setCDecimalPlaceQuantity($cDecimalPlaceQuantity) {
        $this->cDecimalPlaceQuantity = $cDecimalPlaceQuantity;

        return $this;
    }

    /**
     * Get cDecimalPlaceQuantity
     *
     * @return integer 
     */
    public function getCDecimalPlaceQuantity() {
        return $this->cDecimalPlaceQuantity;
    }

    /**
     * Add products
     *
     * @param \Libetto\ItemBundle\Entity\Product $products
     * @return ProductGroup
     */
    public function addProduct(\Libetto\ItemBundle\Entity\Product $products) {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Libetto\ItemBundle\Entity\Product $products
     */
    public function removeProduct(\Libetto\ItemBundle\Entity\Product $products) {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts() {
        return $this->products;
    }

}