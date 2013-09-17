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
//    
//    public function getProjectsAction() {
//        $usr = $this->get('security.context')->getToken()->getUser();
//        if ($usr != "anon.") {
//            $redmineAPIKey = $usr->getRedmineAPIKey();
//
//            $config['url'] = "http://194.25.215.166/redmine";
//            $config['apikey'] = $usr->getRedmineAPIKey();
//            $config['port'] = "10024";
//            $config['offset'] = "0";
//            $config['limit'] = "100";
//
//            $_redmine = new Redmine($config);
//
//            // List all Projects
//            $projects = $_redmine->getProjects();
//            //print_r($projects);
//            $jsonProjects = json_encode($projects);
//            echo $jsonProjects;
//            //return array('records' => $projects);
//        }else{
//            return array("Message" => "Please login.");
//        }
//    }

    /**
     * @param Array $projectId
     * @return array
     * @View()
     */
    public function getProjectAction($projectId) {
        //$issues = $this->getDoctrine()->getRepository('VisionsUserBundle:User')->find($user);
        //return $client->api('project')->show($projectId);
        
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
