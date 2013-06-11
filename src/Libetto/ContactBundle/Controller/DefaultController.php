<?php

namespace Libetto\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LibettoContactBundle:Default:index.html.twig', array('name' => $name));
    }
}
