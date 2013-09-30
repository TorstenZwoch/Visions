<?php

namespace Visions\API\RedmineBundle\Controller;

use Visions\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Visions\API\RedmineBundle\Classes\Redmine;
use Redmine\Client as RedmineClient;

class ProjectsController extends Controller {

    /**
     * @return array
     * @View()
     */
    public function getProjectsAction() {
        $usr = $this->get('security.context')->getToken()->getUser();
        if ($usr != "anon.") {
            $client = new RedmineClient($usr->getRedmineAPIUrl(), $usr->getRedmineAPIKey());
            $client->setPort($usr->getRedmineAPIPort());
            return array("Message" => $client->api('project')->all());
        }else{
            return array("Message" => "Please login.");
        }
    }    

    /**
     * @param Array $projectId
     * @return array
     * @View()
     */
    public function getProjectAction($projectId) {
        $usr = $this->get('security.context')->getToken()->getUser();
        if ($usr != "anon.") {
            $client = new RedmineClient($usr->getRedmineAPIUrl(), $usr->getRedmineAPIKey());
            $client->setPort($usr->getRedmineAPIPort());
            return array("Message" => $client->api('project')->show($projectId));
        }else{
            return array("Message" => "Please login.");
        } 
    }   
}
