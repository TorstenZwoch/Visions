<?php

namespace Libetto\MaintenanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class JQUITestController extends Controller {

    public function testAction() {
        return $this->render('LibettoMaintenanceBundle:JQUITest:index.html.twig');
    }

    public function loadAjaxAction() {
        $request = $this->get('request');
        $name = $request->query->get('term');

        if ($name != "") {//if the user has written his name
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('LibettoUserBundle:User')->findOneByUsername($name);
            if ($user != null) {
                $greeting = 'Hello ' . $name . '. Your email address is: ' . $user->getEmail();
                $return = array("responseCode" => 200, "greeting" => $greeting);
            } else {
                $return = array("responseCode" => 200, "greeting" => "User $name not found!");
            }
        } else {
            $return = array("responseCode" => 400, "greeting" => "You have to write your name!");
        }

        $return = json_encode($return); //jscon encode the array
        return new Response($return, 200, array('Content-Type' => 'application/json')); //make sure it has the correct content type
    }

    
    public function loadAjaxMasterAction() {
        $request = $this->get('request');
        $name = $request->query->get('term');

        if ($name != "") {//if the user has written his name
            $repository = $this->getDoctrine()
                    ->getRepository('LibettoMaintenanceBundle:Master');

            $qb = $repository->createQueryBuilder('m');
            $q = $qb->where($qb->expr()->like('m.cTableName', ':tabname'))
                    ->setParameter('tabname', "%$name%")
                    ->orderBy('m.cFieldName', 'ASC')
                    ->getQuery();

            $fields = $q->getArrayResult();
            $out = array();
            foreach($fields as $row){
                $key = $row['cTableName'].'_'.$row['cFieldName'];
                $text = $row['cTableName'].'|'.$row['cFieldName'].'|'.$row['cType'].'|'.($row['cIsIndex']==false?'F':'T');
                $out[] = array("id"=>$key, "label"=>$text, "value" => strip_tags($text)); 
            }
            if ($fields != null) {
                $return = $out;
            } else {
                $return = array("msg" => "Table $name not found!");
            }
        } else {
            $return = array("msg" => "You have to write a name!");
        }

        $return = json_encode($return); //jscon encode the array
        return new Response($return, 200, array('Content-Type' => 'application/json')); //make sure it has the correct content type
    }

}
