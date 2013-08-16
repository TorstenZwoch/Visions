<?php

namespace Libetto\UserBundle\Controller;

use Libetto\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class UserRestController extends Controller
{
    /**
     * @return array
     * @View()
     */
    public function getUsersAction()
    {
        $users = $this->getDoctrine()->getRepository('LibettoUserBundle:User')->findAll();
        
        return array('users' => $users);
    }
    
    /**
     * @param User $user
     * @return array
     * @View()
     * @ParamConverter("user", class="LibettoUserBundle:User")
     */
    public function getUserAction(User $user)
    {        
        $users = $this->getDoctrine()->getRepository('LibettoUserBundle:User')->find($user);
        return array('users' => $users);
    }
}
