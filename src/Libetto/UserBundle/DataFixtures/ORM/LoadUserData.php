<?php

namespace Libetto\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Libetto\UserBundle\Entity\User;

/**
 * Description of LoadUserData
 *
 * @author torstenzwoch
 */
class LoadUserData implements FixtureInterface{
    //put your code here
    
    public function load(ObjectManager $manager){
        $user = new User();
        $user->setUsername("Torsten");
        $user->setEmail("info@123.de");
        $user->setPassword("5678");
        
        $user2 = new User();
        $user2->setUsername("TorstenZwoch");
        $user2->setEmail("info@1234.de");
        $user2->setPassword("5678");
        
        $manager->persist($user);
        $manager->persist($user2);
        
        $manager->flush();
    }
}

?>
