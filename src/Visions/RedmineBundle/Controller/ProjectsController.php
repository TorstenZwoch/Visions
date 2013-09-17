<?php

namespace Visions\RedmineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ProjectsController extends Controller {

    /**
     * @Template()
     */
    public function widgetProjectListAction() {
        echo "List";
        return array('name' => null);
    }
    
    /**
     * @param $projectId
     * @Template()
     */
    public function widgetProjectDetailsAction($projectId = "") {
        echo "Project";
        return array('name' => null);
    }    

}
