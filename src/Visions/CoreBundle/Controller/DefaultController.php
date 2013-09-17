<?php

namespace Visions\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VisionsCoreBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function getUser()
    {
        return $this->get('security.context')->getToken()->getUser();
    }     
}
