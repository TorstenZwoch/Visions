<?php

namespace Libetto\ItemBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Libetto\ItemBundle\Entity\ProductGroup;

/**
 * Description of LoadProductGroupData
 *
 * @author dm
 */
class LoadProductGroupData implements FixtureInterface {

    public function load(ObjectManager $manager) {

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

}

?>
