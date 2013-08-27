<?php

namespace Libetto\ItemBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Libetto\ItemBundle\Entity\Category;
use Libetto\ItemBundle\Entity\ProductGroup;
use Libetto\ItemBundle\Entity\Product;

/**
 * Description of LoadProductGroupData
 *
 * @author dm
 */
class LoadItemData implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $this->loadCategories($manager);
        $this->loadGroups($manager);
        $this->loadProducts($manager);
        $this->loadProductTexts($manager);
        $this->loadMedia($manager);
    }

    public function loadCategories(ObjectManager $manager) {

        $o = new Category();
        $o->setCNumber("001");
        $o->setCName("Wakeboarding");
        $o->setCSort(1);
        $manager->persist($o);
        $manager->flush();

        $o = $manager->getRepository('Libetto\ItemBundle\Entity\Category')->findOneBy(array('cNumber' => '001'));

        $o2 = new Category();
        $o2->setCNumber("011");
        $o2->setCName("Wakeboards");
        $o2->setCSort(1);
        $o2->setParentCategory($o);
        $manager->persist($o2);

        $o2 = new Category();
        $o2->setCNumber("012");
        $o2->setCName("Bindungen");
        $o2->setCSort(2);
        $o2->setParentCategory($o);
        $manager->persist($o2);

        $o2 = new Category();
        $o2->setCNumber("013");
        $o2->setCName("Sets");
        $o2->setCSort(3);
        $o2->setParentCategory($o);
        $manager->persist($o2);

        $manager->flush();
    }

    public function loadGroups(ObjectManager $manager) {

        $o = new ProductGroup();
        $o->setCNumber("001");
        $o->setCName("Kiteboards");
        $o->setCSort(1);
        $o->setCIsSalesDiscountable(true);
        $o->setCIsCashDiscountable(false);
        $o->setCDecimalPlacePrice(2);
        $o->setCDecimalPlaceQuantity(2);
        $manager->persist($o);

        $o = new ProductGroup();
        $o->setCNumber("002");
        $o->setCName("Wakeboards");
        $o->setCSort(2);
        $o->setCIsSalesDiscountable(false);
        $o->setCIsCashDiscountable(true);
        $o->setCDecimalPlacePrice(0);
        $o->setCDecimalPlaceQuantity(0);
        $manager->persist($o);

        $manager->flush();
    }

    public function loadProducts(ObjectManager $manager) {

        $category = $manager->getRepository('Libetto\ItemBundle\Entity\Category')->findOneBy(array('cNumber' => '011'));
        $group = $manager->getRepository('Libetto\ItemBundle\Entity\ProductGroup')->findOneBy(array('cNumber' => '002'));

        for ($i = 0; $i < 500; $i++) {
            $o = new Product();
            $o->setCNumber("2102-" . $i);
            $o->setCName("Wakeboard LIQUID FORCE SHANE 201" . $i . "0");
            $o->setCShortName("Wakeboard SHANE " . $i );
            $o->setCDescription("Das PRO-Modell von Shane Bonifay");
            $o->setCategory($category);
            $o->setProductGroup($group);
            $manager->persist($o);

            $o = new Product();
            $o->setCNumber("2103-" . $i);
            $o->setCName("Wakeboard LIQUID FORCE GROOVE 2" . $i . "210");
            $o->setCShortName("Wakeboard GROOVE " . $i);
            $o->setCDescription("Stylisches Wakeboard mit traumhafter Performance");
            $o->setCategory($category);
            $o->setProductGroup($group);
            $manager->persist($o);

            $o = new Product();
            $o->setCNumber("2104-" . $i);
            $o->setCName("Wakeboard LIQUID FORCE S4 20" . $i . "16");
            $o->setCShortName("Wakeboard FORCE S4" . $i);
            $o->setCDescription("Das PRO-Modell von Phillip Soven");
            $o->setCategory($category);
            $o->setProductGroup($group);
            $manager->persist($o);
            
        }$manager->flush();
    }

    public function loadProductTexts(ObjectManager $manager) {
        for ($i = 0; $i < 500; $i++) {
            $product = $manager->getRepository('Libetto\ItemBundle\Entity\Product')->findOneBy(array('cNumber' => '2102-' . $i));
            $o = new \Libetto\ItemBundle\Entity\ProductText();
            $o->setCLanguage("de-de");
            $o->setCName("LIQUID FORCE S4 2010 MadeInGermany");
            $o->setCShortName("LIQUID MadeInGermany");
            $o->setCDescription("Wakeboard LIQUID FORCE S4 Hergestellt in Deutschland");
            $o->setProduct($product);
            $o->setCDescriptionType(1);
            $manager->persist($o);

            $o = new \Libetto\ItemBundle\Entity\ProductText();
            $o->setCLanguage("en-us");
            $o->setCName("LIQUID FORCE S4 2010 MadeInUSA");
            $o->setCShortName("LIQUID MadeInUSA");
            $o->setCDescription("Wakeboard LIQUID FORCE S4 Produced in USA");
            $o->setProduct($product);
            $o->setCDescriptionType(1);
            $manager->persist($o);

            $o = new \Libetto\ItemBundle\Entity\ProductText();
            $o->setCLanguage("en-en");
            $o->setCName("LIQUID FORCE S4 2010 MadeInUK");
            $o->setCShortName("LIQUID MadeInUK");
            $o->setCDescription("Wakeboard LIQUID FORCE S4 Produced in United Kingdom");
            $o->setProduct($product);
            $o->setCDescriptionType(1);
            $manager->persist($o);
        }
        $manager->flush();
    }

    public function loadMedia(ObjectManager $manager) {
        $product = $manager->getRepository('Libetto\ItemBundle\Entity\Product')->findOneBy(array('cNumber' => '2102-1'));

        $o = new \Libetto\ItemBundle\Entity\Media();
        $o->setCPath("\html\pictures\2102.jpg");
        $o->setCText("Artikelgrafik");
        $o->setCType("PIC");
        $o->setProduct($product);
        $manager->persist($o);

        $o = new \Libetto\ItemBundle\Entity\Media();
        $o->setCPath("\html\marketing\2102.pdf");
        $o->setCText("Flyer");
        $o->setCType("PDF");
        $o->setProduct($product);
        $manager->persist($o);

        $manager->flush();
    }

}

?>
