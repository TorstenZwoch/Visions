<?php

namespace M\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller {

    /**
     * @Route("/product")
     * @Template()
     */
    public function indexAction() {
        echo 'Index';
        return array();
    }

    /**
     * @Route("/product/{id}")
     * @Template()
     */
    public function editAction($id) {
        return array('name' => $name);
    }

}
