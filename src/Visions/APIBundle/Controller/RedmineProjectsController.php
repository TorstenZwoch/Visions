<?php

namespace Visions\APIBundle\Controller;

use Visions\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Visions\APIBundle\ExternalAPI\Redmine;

class RedmineProjectsController extends Controller {

    /**
     * @return array
     * @View()
     */
    public function getProjectsAction() {
        $usr = $this->get('security.context')->getToken()->getUser();
        if ($usr != "anon.") {
            $config['url'] = $usr->getRedmineAPIUrl();
            $config['apikey'] = $usr->getRedmineAPIKey();//"c8a6362925a742f793945d92bb61282b64ecd874";
            $config['port'] = $usr->getRedmineAPIPort();
            $config['offset'] = "0";
            $config['limit'] = "100";

            $_redmine = new Redmine($config);

            // List all Projects
            $projects = $_redmine->getProjects();
            //print_r($projects);
            $jsonProjects = json_encode($projects);
            echo $jsonProjects;
            //return array('records' => $projects);
        }else{
            return array("Message" => "Please login.");
        }
    }

    /**
     * @param $projectId
     * @return array
     * @View()
     */
    public function getProjectAction($projectId) {
        
        $usr = $this->get('security.context')->getToken()->getUser();

        if ($usr != "anon.") {
            $config['url'] = $usr->getRedmineAPIUrl();
            $config['apikey'] = $usr->getRedmineAPIKey();//"c8a6362925a742f793945d92bb61282b64ecd874";
            $config['port'] = $usr->getRedmineAPIPort();
            $config['offset'] = "0";
            $config['limit'] = "100";
     
            $_redmine = new Redmine($config);

            // Get one Projects
            $result =  $_redmine->getProjects($projectId);
            $project = json_decode( json_encode($result) , 1);
            
            return $project;
        }else{
            return array("Message" => "Please login.");   
        }
    }

}
