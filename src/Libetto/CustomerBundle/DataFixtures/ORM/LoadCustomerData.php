<?php

namespace Libetto\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Libetto\CustomerBundle\Entity\Customer;

/**
 * Description of LoadCustomerData
 *
 * @author torstenzwoch
 */
class LoadCustomerData implements FixtureInterface {

    //put your code here

    public function load(ObjectManager $manager) {
        $object = new Customer();
        $object->setCNumber("12345678");
        $object->setCInfo("Super");

        $manager->persist($object);
        $manager->flush();

        $user = $manager->getRepository('Libetto\CustomerBundle\Entity\Customer')->findOneBy(array('cNumber' => '12345678'));

        $object2 = new Customer();
        $object2->setCNumber("12345678");
        $object2->setCInfo("Super" . $user->getId() . "te");

        $manager->persist($object2);
        $manager->flush();        
    }

}

?>
