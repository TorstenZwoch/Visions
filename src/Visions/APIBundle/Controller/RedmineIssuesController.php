<?php

namespace Visions\APIBundle\Controller;

use Visions\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Visions\APIBundle\ExternalAPI\Redmine;

class IssuesController extends Controller {

    /**
     * @return array
     * @View()
     */
    public function getIssuesAction() {
        $usr = $this->get('security.context')->getToken()->getUser();
        $redmineAPIKey = $usr->getRedmineAPIKey();

        $config['url'] = "http://194.25.215.166/redmine";
        $config['apikey'] = $usr->getRedmineAPIKey();
        $config['port'] = "10024";
        $config['offset'] = "0";
        $config['limit'] = "100";
        $_redmine = new Redmine($config);

        // List all Projects
        $projects = $_redmine->getProjects();
        //print_r($projects);
        foreach ($projects->project as $project)
            echo $project->id . " - " . $project->name . "<br />";


        echo "<br /><br /><br /><br />";
        $project = $_redmine->getProjects("prod_libetto");
        $y = json_encode($project);
        print_r($y);
        // Get userId
        //$userId = $_redmine->getUserId('tz');
        //print_r($userId);
        // Add an Issue
        //$addedIssueDetails = $_redmine->addIssue('Titel', 'Body', 1, 1, $userId, $open_date, $priority);
        //$addIssueID = (int)$addedIssueDetails->id;
        // Add an note to the issue
        //$_redmine->addNoteToIssue($addIssueID, "this is a new message");
        // Close the issue
        //$_redmine->setIssueStatus(true, $addIssueID);
        // Finnaly get the Link
        //print $_redmine->getTrackerItemLink($addIssueID);
        //$issues = $this->getDoctrine()->getRepository('VisionsUserBundle:User')->findAll();
        return array('records' => $issues);
    }

    /**
     * @param Array $issue
     * @return array
     * @View()
     */
    public function getIssueAction(Array $issue) {
        //$issues = $this->getDoctrine()->getRepository('VisionsUserBundle:User')->find($user);
        return array('records' => $issues);
    }

}
