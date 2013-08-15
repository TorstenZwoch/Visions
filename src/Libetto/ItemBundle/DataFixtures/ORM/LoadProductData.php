<?php

namespace Libetto\ItemBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Libetto\ItemBundle\Entity\Product;

/**
 * Description of LoadProductGroupData
 *
 * @author dm
 */
class LoadProductData implements FixtureInterface {

    public function getOrder() {
        return 2;
    }

    public function load(ObjectManager $manager) {

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
