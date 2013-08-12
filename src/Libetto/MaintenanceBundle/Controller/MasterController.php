<?php

namespace Libetto\MaintenanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Libetto\MaintenanceBundle\Entity\Master;
use Libetto\MaintenanceBundle\Form\MasterType;
use Libetto\MaintenanceBundle\Grid\Export\XMLExport;
use Libetto\MaintenanceBundle\Grid\Export\EXPExport;
use Doctrine\ORM\Query\ResultSetMapping;
use APY\DataGridBundle\Grid\Source\Entity;
//use APY\DataGridBundle\Grid\Export\XMLExport;
use APY\DataGridBundle\Grid\Export\ExcelExport;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Export\JSONExport;

class MasterController extends Controller {

    /**
     * Listet die Einträger der Mastertabelle auf
     * @return type
     */
    public function listAction() {
        //Master-Entity als Source
        $source = new Entity("LibettoMaintenanceBundle:Master");

        //Immer die cOrderId an das orderBy anhängen
        $source->manipulateQuery(
                function ($query) { //Callback-Funktion
                    //Rootalias holen und orderBy setzen
                    $query->addOrderBy($query->getRootAlias() . '.cOrderId', 'ASC');
                }
        );
        //Grid holen
        $grid = $this->get('grid');


        //Quelle setzen
        $grid->setSource($source);

        //Palten für die Anzeige ausblenden
        $grid->hideColumns(array('cId'/* ,'creationDate','modifyDate','creationUser','modifyUser' */));
        // Set the selector of the number of items per page
        $grid->setLimits(array(10, 25, 50, 100));
        // Set the default order of the grid
        $grid->setDefaultOrder('cTableName', 'asc');

        //Bearbeiten-Action
        $rowAction = new RowAction('bearbeiten', 'master_edit');
        $grid->addRowAction($rowAction);

        //Delete-Action
        $rowAction2 = new RowAction('löschen', 'master_delete', true, '_self', array('class' => 'grid_delete_action'));
        $rowAction2->setConfirmMessage("Diesen Eintrag löschen?");
        $grid->addRowAction($rowAction2);


        // Set the default page
        $grid->setPage(1);
        //Exporte setzen
        #$grid->addExport(new XMLExport('XML Export', "master"));
        #$grid->addExport(new ExcelExport('Excel Export', "master"));
        $grid->addExport(new EXPExport('EXP Export', "master"));
        #$grid->addExport(new JSONExport('JSON Export', "master"));

        return $grid->getGridResponse('LibettoMaintenanceBundle:Master:list.html.twig');
    }

    /**
     * Master-Eintrag bearbeiten
     * @param type $cId
     * @return type
     */
    public function editAction($cId = null) {

        ## $upload = $this->get('file_upload');
        ##var_dump($upload->getName());

        $mt = new MasterType();
        $mt->setBackUrl($this->generateUrl('master_list'));
        $em = $this->getDoctrine()->getManager();
        if ($cId != null) {
            $masterTab = $em->getRepository('LibettoMaintenanceBundle:Master')->find($cId);
            $mt->setIsNew(false);
        } else {
            $masterTab = new Master(); //Entity
        }

        $form = $this->createForm($mt, $masterTab);

        $request = $this->getRequest();
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {

            //    $form->bindRequest($request);
            if ($form->isValid()) {

                //Tabellenname anpassen
                $masterTab->setCTableName($this->cleanTablename($masterTab->getCTablename()));
                //Feldnamen anpassen
                $masterTab->setCFieldName($this->cleanFieldname($masterTab->getCFieldName(), $masterTab->getCType()));
                if ($form->get("cId")->getData() != "") {
                    $masterTab->setCId($form->get("cId")->getData());
                }
                ##$this->get('session')->getFlashBag()->add('success', 'die ID aus der Form ist '. $masterTab->getCId());
                //Persiting to Database
                //$em->persist($masterTab);
                $em->merge($masterTab);
                $em->flush();


                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                if ($form->get('btSaveExit')->isClicked()) {
                    return $this->redirect($this->generateUrl('master_list'));
                }
                if ($form->get('btSaveNew')->isClicked()) {

                    $mt->setIsNew(false);
                    $masterTab->setCId(null);
                    $masterTab->setCOrderId($masterTab->getCOrderId() + 1);
                    $form = $this->createForm($mt, $masterTab);
                }
                $this->get('session')->getFlashBag()->add('success', sprintf("Datensatz %s -> %s gespeichert!", $masterTab->getCTableName(), $masterTab->getCFieldName()));
            }
        }

        return $this->render('LibettoMaintenanceBundle:Master:edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    /**
     * Datensatz löschen und zurück zur Liste springen
     * @param type $cId
     * @return type
     */
    public function deleteAction($cId = null) {
        if ($cId == null) {
            $this->get('session')->getFlashBag()->add('error', "Datensatz nicht gelöscht!");
        } else {
            $em = $this->getDoctrine()->getManager();
            $mt = new MasterType();
            $masterTab = $em->getRepository('LibettoMaintenanceBundle:Master')->find($cId);
            $em->remove($masterTab);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', "Datensatz " . $id . " gelöscht!");
        }
        return $this->redirect($this->generateUrl('master_list'));
    }

    /**
     * Datenbankstruktur aktualisieren
     * @return type
     */
    public function refreshAction() {
        //Create the data structure according the master table definition
        $this->createDataStructure($this->getMasterDefinition());
        return $this->redirect($this->generateUrl('master_list'));
    }

    /**
     * EXP-Datei importieren
     */
    public function importAction() {
        
    }

    private function getMasterDefinition() {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $qb->add('select', 'm')
                ->add('from', 'LibettoMaintenanceBundle:Master m')
                ->add('orderBy', 'm.cTableName,m.cOrderId ');

        $query = $qb->getQuery();
        $array = $query->getArrayResult();
        $data = array();
        foreach ($array as $row) {
            $data[$row['cTableName']][$row['cOrderId']] = $row;
        }
        unset($array);
        unset($query);
        return $data;
    }

    private function cleanTablename($name) {
        $name = strtolower($name);
        if ($name[0] != 't') { // 't' hinzufügen, falls nicht vorhanden
            $name = 't' . $name;
        }
        $name = str_replace(" ", "", $name);
        return $name;
    }

    private function cleanFieldname($name, $type = null) {
        $name = str_replace(" ", "", $name);

        if ($type == 'KEY') {
            //prüfen auf r und 2. Zeichen groß
            if (!($name[0] == 'r' && $name[1] == strtoupper($name[1]))) {
                $name = 'r' . ucfirst($name);
            }
        } else {
            //prüfen auf c und 2. Zeichen groß
            if (!($name[0] == 'c' && $name[1] == strtoupper($name[1]))) {
                $name = 'c' . ucfirst($name);
            }
        }

        return $name;
    }

    private function createDataStructure($data) {
        $em = $this->getDoctrine()->getManager();

        $this->checkTable("tmaster", $em);
        if (is_array($data) && count($data) > 0) {
            foreach ($data as $tablename => $rows) {
                try {
                    if ($this->checkTable($tablename, $em) === false) { //table does not exist
                        $sql = $this->getCreateStatement($tablename, $rows, $this->container->getParameter('database_driver'));
                        $stmt = $em->getConnection()->prepare($sql);
                        $stmt->execute();
                    }
                } catch (\Doctrine\DBAL\DBALException $e) {
                    $this->get('session')->getFlashBag()->add('error', "Fehler beim Anlegen der Tabelle $tablename:".$e->getMessage());
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
            ## echo "$tablename exists<br>";
            $sm = $conn->getSchemaManager();
            $columns = $sm->listTableColumns($tablename);
            ##foreach ($columns as $column) {
            ##    echo $column->getName() . ': ' . $column->getType() . "\n";
            ##}
            return $columns;
        } catch (\Doctrine\DBAL\DBALException $e) {
            return false;
        }
    }

    private function getCreateStatement($tablename, $rows, $db_driver) {
        $cols = array();
        $keys = array();
        $unique = array();

        foreach ($rows as $row) {
            $str = $row['cFieldName'] . " " . $this->getSQLType($row['cType'], $db_driver) . "";
            if (strtolower($row['cFieldName']) == "id") {
                $str .= " PRIMARY KEY ";
            } else {
                $str .= " NULL ";
            }
            $cols[] = $str;
            if ($row['cIsIndex'] == true) {
                $keys[] = "KEY idx_" . $row['cTableName'] . "_" . $row['cFieldName'] . " (" . $row['cFieldName'] . ")";
            }
            if ($row['cIsUnique'] == true) {
                $unique[] = $row['cFieldName'];
            }
        }

        if (count($unique) > 0) {
            $cols[] = "UNIQUE uidx_" . $row['cTableName'] . "_" . implode("_", $unique) . " (" . implode(",", $unique) . ") ";
        }

        if (count($keys) > 0) {
            $cols[] = implode(",", $keys);
        }

        $stm = "CREATE TABLE $tablename (%s) ";
        return sprintf($stm, implode(",\n", $cols));
    }

    private function getSQLType($type, $db_driver) {
        switch ($db_driver) {
            case "pdo_mysql":
                switch ($type) {
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
