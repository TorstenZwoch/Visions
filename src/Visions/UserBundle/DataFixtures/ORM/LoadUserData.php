<?php

namespace Visions\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Visions\UserBundle\Entity\User;

/**
 * Description of LoadUserData
 *
 * @author torstenzwoch
 */
class LoadUserData implements FixtureInterface{
    //put your code here
    
    public function load(ObjectManager $manager){
        $user = new User();
        $user->setUsername("admin");
        $user->setEmail("admin@example.com");
        $user->setPlainPassword("admin");
        $user->addRole('ROLE_SUPER_ADMIN');
        $user->setRedmineAPIKey("c8a6362925a742f793945d92bb61282b64ecd874");
        $user->setRedmineAPIPort(10024);
        $user->setRedmineAPIUrl("http://194.25.215.166/redmine");
        $users[] = $user;
        
        $user = new User();
        $user->setUsername("demo");
        $user->setEmail("demo@example.com");
        $user->setPlainPassword("demo");
        $users[] = $user;
        
        foreach ($users as $user) {
            $user->setEnabled(true);
            $manager->persist($user);
        }
        
        $manager->flush();
    }
}

?>
