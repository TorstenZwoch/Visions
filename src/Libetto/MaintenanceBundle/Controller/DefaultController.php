<?php

namespace Libetto\MaintenanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LibettoMaintenanceBundle:Default:index.html.twig');
    }
}
