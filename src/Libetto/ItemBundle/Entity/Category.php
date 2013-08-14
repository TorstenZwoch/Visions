<?php

namespace Libetto\ItemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libetto\CoreBundle\Entity\BaseTable as BASE;

/**
 * Category
 *
 * @ORM\Table(name="tCategory")
 * @ORM\Entity(repositoryClass="Libetto\ItemBundle\Entity\CategoryRepository")
 */
class Category extends BASE {

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     */
    protected $products;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="childCategories")
     * @ORM\JoinColumn(name="rParentCategory", referencedColumnName="cId")
     */
    protected $parentCategory;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parentCategory")
     */
    protected $childCategories;

    public function __construct() {
        parent::__construct();
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
        $this->childCategories = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @var guid
     *
     * @ORM\Column(name="rParentCategory", type="guid", nullable=true)
     */
    private $rParentCategory;

    /**
     * @var integer
     *
     * @ORM\Column(name="cSort", type="integer")
     */
    private $cSort;

    /**
     * Set cNumber
     *
     * @param string $cNumber
     * @return Category
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
     * @return Category
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
     * Set rParentCategory
     *
     * @param guid $rParentCategory
     * @return Category
     */
    public function setRParentCategory($rParentCategory) {
        $this->rParentCategory = $rParentCategory;

        return $this;
    }

    /**
     * Get rParentCategory
     *
     * @return guid 
     */
    public function getRParentCategory() {
        return $this->rParentCategory;
    }

    /**
     * Set cSort
     *
     * @param integer $cSort
     * @return Category
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
     * Add products
     *
     * @param \Libetto\ItemBundle\Entity\Product $products
     * @return Category
     */
    public function addProduct(\Libetto\ItemBundle\Entity\Product $products)
    {
        $this->products[] = $products;
    
        return $this;
    }

    /**
     * Remove products
     *
     * @param \Libetto\ItemBundle\Entity\Product $products
     */
    public function removeProduct(\Libetto\ItemBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set parentCategory
     *
     * @param \Libetto\ItemBundle\Entity\Category $parentCategory
     * @return Category
     */
    public function setParentCategory(\Libetto\ItemBundle\Entity\Category $parentCategory = null)
    {
        $this->parentCategory = $parentCategory;
    
        return $this;
    }

    /**
     * Get parentCategory
     *
     * @return \Libetto\ItemBundle\Entity\Category 
     */
    public function getParentCategory()
    {
        return $this->parentCategory;
    }

    /**
     * Add childCategories
     *
     * @param \Libetto\ItemBundle\Entity\Category $childCategories
     * @return Category
     */
    public function addChildCategorie(\Libetto\ItemBundle\Entity\Category $childCategories)
    {
        $this->childCategories[] = $childCategories;
    
        return $this;
    }

    /**
     * Remove childCategories
     *
     * @param \Libetto\ItemBundle\Entity\Category $childCategories
     */
    public function removeChildCategorie(\Libetto\ItemBundle\Entity\Category $childCategories)
    {
        $this->childCategories->removeElement($childCategories);
    }

    /**
     * Get childCategories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildCategories()
    {
        return $this->childCategories;
    }
}