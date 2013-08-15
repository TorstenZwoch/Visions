<?php

namespace Libetto\ItemBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Libetto\ItemBundle\Entity\Category;

/**
 * Description of LoadProductGroupData
 *
 * @author dm
 */
class LoadCategoryData implements FixtureInterface {

    public function load(ObjectManager $manager) {

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

}

?>
