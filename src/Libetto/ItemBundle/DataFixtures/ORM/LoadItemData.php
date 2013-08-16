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

        $o = new Product();
        $o->setCNumber("2102");
        $o->setCName("Wakeboard LIQUID FORCE SHANE 2010");
        $o->setCShortName("Wakeboard SHANE");
        $o->setCDescription("Das PRO-Modell von Shane Bonifay");
        $o->setCategory($category);
        $o->setProductGroup($group);
        $manager->persist($o);

        $o = new Product();
        $o->setCNumber("2103");
        $o->setCName("Wakeboard LIQUID FORCE GROOVE 2010");
        $o->setCShortName("Wakeboard GROOVE");
        $o->setCDescription("Stylisches Wakeboard mit traumhafter Performance");
        $o->setCategory($category);
        $o->setProductGroup($group);
        $manager->persist($o);

        $o = new Product();
        $o->setCNumber("2103");
        $o->setCName("Wakeboard LIQUID FORCE S4 2010");
        $o->setCShortName("Wakeboard FORCE S4");
        $o->setCDescription("Das PRO-Modell von Phillip Soven");
        $o->setCategory($category);
        $o->setProductGroup($group);
        $manager->persist($o);

        $manager->flush();
    }

}

?>
