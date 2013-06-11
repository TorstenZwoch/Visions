<?php

namespace Libetto\MaintenanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Libetto\MaintenanceBundle\Entity\Master;
use Libetto\MaintenanceBundle\Form\MasterType;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Export\XMLExport;
use APY\DataGridBundle\Grid\Export\ExcelExport;
use APY\DataGridBundle\Grid\Action\RowAction;
use Doctrine\ORM\Query\ResultSetMapping;

class MasterController extends Controller {

    public function listAction() {
        $source = new Entity("LibettoMaintenanceBundle:Master");
        //   /* @var $grid \APY\DataGridBundle\Grid\Grid */

        $grid = $this->get('grid');
        $grid->setSource($source);
        $grid->hideColumns(array('cId'/* ,'creationDate','modifyDate','creationUser','modifyUser' */));
        // Set the selector of the number of items per page
        $grid->setLimits(array(25, 50, 100));
        // Set the default order of the grid
        $grid->setDefaultOrder('cTableName', 'asc');

        
        $rowAction = new RowAction('Edit', 'master_edit');
        //$rowAction2->setRouteParameters(array('tablename', 'orderid' ));
        $grid->addRowAction($rowAction);

          
        
        // Set the default page
        $grid->setPage(1);
        $grid->addExport(new XMLExport('XML Export'));
        $grid->addExport(new ExcelExport('Excel Export'));

        return $grid->getGridResponse('LibettoMaintenanceBundle:Master:list.html.twig');
    }

    
    public function editAction($cId = null) {
       
        $em = $this->getDoctrine()->getManager();
        if($cId!=null){
            $masterTab = $em->getRepository('LibettoMaintenanceBundle:Master')->find($cId);
        }else{
            $masterTab = new Master(); //Entity
        }
        $mt = new MasterType();
        $mt->setBackUrl($this->generateUrl('master_list'));
        $form = $this->createForm($mt, $masterTab);
        
        $request = $this->getRequest();
        $form->handleRequest($request);
        
        if ($request->getMethod() == 'POST') {
           
        //    $form->bindRequest($request);
            if ($form->isValid()) {
               
               
                $masterTab->setCTableName($this->cleanTablename($masterTab->getCTablename()));
                $masterTab->setCFieldName($this->cleanTablename($masterTab->getCFieldName()));
                if( $form->get("cId")->getData()!= "" ){
                    $masterTab->setCId($form->get("cId")->getData());
                }
                ##$this->get('session')->getFlashBag()->add('success', 'die ID aus der Form ist '. $masterTab->getCId());
                
                //Persiting to Database
                //$em->persist($masterTab);
                $em->merge($masterTab);
                $em->flush();
                

                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                if ($form->get('btSaveExit')->isClicked() ) {
                    return $this->redirect($this->generateUrl('master_list'));
                }else{
                   // $form->get("cOrderId")->setData($form->get("cOrderId")->getData()+1);
                }
                $this->get('session')->getFlashBag()->add('success', sprintf('Datensatz %s -> %s gespeichert!',
                                                                                            $masterTab->getCTableName(),
                                                                                            $masterTab->getCFieldName()));
            }
        }

        return $this->render('LibettoMaintenanceBundle:Master:edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function refreshAction() {
        //Create the data structure according the master table definition
        $this->createDataStructure($this->getMasterDefinition());
        return $this->render('LibettoMaintenanceBundle:Master:refresh.html.twig');
    }

    private function getMasterDefinition() {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $qb->add('select', 'm')
                ->add('from', 'LibettoMaintenanceBundle:Master m')
                ->add('orderBy', 'm.tablename,m.orderid ');

        $query = $qb->getQuery();
        $array = $query->getArrayResult();
        $data = array();
        foreach ($array as $row) {
            $data[$row['tablename']][$row['orderid']] = $row;
        }
        unset($array);
        unset($query);
        return $data;
    }

    private function cleanTablename($name){
        $name = strtolower($name);
        $name = str_replace(" ","",$name);
        return $name;
    }
    
    private function createDataStructure($data) {
        $em = $this->getDoctrine()->getManager();
        
        $this->checkTable("master", $em);
        if (is_array($data) && count($data) > 0) {
            foreach ($data as $tablename => $rows) {
                if ($this->checkTable($tablename, $em) === false) { //table does not exist
                     $sql = $this->getCreateStatement($tablename,$rows,$this->container->getParameter('database_driver'));
                     $stmt = $em->getConnection()->prepare($sql);
                     $stmt->execute();
                }
            }
        }
       
       
    }

    /**
     * checkTable checks, whether the table exists
     * @param type $tablename
     * @param type $em
     * @return boolean
     */
    function checkTable($tablename, &$em) {
        $sql = "select * from " . $tablename . " limit 0";
        $conn = $em->getConnection();
        $stmt = $conn->prepare($sql);
        try {
            $stmt->execute();
           // $master = $stmt->fetchAll();
            echo "$tablename exists<br>";
            $sm = $conn->getSchemaManager();
            $columns = $sm->listTableColumns($tablename);
            foreach ($columns as $column) {
                echo $column->getName() . ': ' . $column->getType() . "\n";
            }
            return $columns;
        } catch (\Doctrine\DBAL\DBALException $e) {
            return false;
        }
    }
    
    private function getCreateStatement($tablename,$rows,$db_driver){
        $cols = array();
        $keys = array();
        $unique = array();
        
        foreach($rows as $row){
            $str = $row['fieldname']." ".$this->getSQLType($row['type'],$db_driver)."";
            if(strtolower($row['fieldname']) == "id" ){
                $str .= " PRIMARY KEY ";
            }else{
                $str .= " NULL ";
            }
            $cols[] = $str;
            if($row['isindex']=='1'){
                $keys[] = "KEY idx_".$row['tablename']."_".$row['fieldname']." (".$row['fieldname'].")" ;
            }
            if($row['isunique']=='1'){
                $unique[] = $row['fieldname'] ;
            }
        }
        
        if(count($unique)>0){
            $cols[] = "UNIQUE uidx_".$row['tablename']."_". implode("_",$unique). " (".implode(",",$unique).") ";
        }
        
        if(count($keys)>0){
            $cols[] = implode(",",$keys);
        }  
        
        $stm = "CREATE TABLE $tablename (%s) ";
        return sprintf($stm,implode(",\n",$cols));
    }
    
    
    private function getSQLType($type, $db_driver){
        switch($db_driver){
            case "pdo_mysql":
                switch($type){
                    case "STR64": 
                        return "varchar(64)";
                    case "STR255": 
                        return "varchar(255)";
                    case "TEXT": 
                        return "text";
                    case "BOOL": 
                        return "bool";
                    case "INT": 
                        return "int";
                    case "DEC": 
                        return "decimal(13,4)";
                    case "DATE": 
                        return "DATETIME";
                    case "KEY": 
                        return "varchar(36)";
                       
                }
            break;
        }
    }

}
