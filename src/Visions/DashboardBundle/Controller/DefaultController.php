<?php

namespace Visions\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Visions\APIBundle\ExternalAPI\Redmine;

/**
 * Visions Default controller.
 *
 * @Route("/")
 */
class DefaultController extends Controller {

    /**
     * @Route("/")
     * @Template()
     * */
    public function indexAction() {
        $usr = $this->get('security.context')->getToken()->getUser();

        if ($usr == null || $usr == "anon.") {
            $username = $usr;
            $redmineAPIKey = "";
        } else {
            $username = $usr->getUsername();
        }
        return array('username' => $username, 'redmineAPIKey' => $redmineAPIKey);
    }

}