<?php

namespace Visions\DocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Visions\DocBundle\Entity\Content;

/**
 * @Route("/content2")
 * @Template()
 */
class ContentController extends Controller {

    /**
     * Show all content elements
     * 
     * @Route("/")
     * @Template()
     */
    public function indexAction() {
        $contents = $this->getDoctrine()
                ->getRepository('VisionsDocBundle:Content')
                ->findAll();

        if (!$contents) {
            throw $this->createNotFoundException(
                    'No content found '
            );
        }

        return array("contents" => $contents);
    }

    /**
     * Form to create content elements
     * 
     * @Route("/create")
     * @Template()
     */
    public function createAction() {
        $content = new Content();
        $content->setCreationUser($this->getGUID());
        $content->setTitle("Erstellung einer Dokumentation");
        $content->setText("In dieser Dokumentation finden sie einige Neuigkeiten");
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($content);
        $em->flush();
        
        // create form
        $form = $this->createFormBuilder($content)
                ->add('Id', 'text')
                ->add('CreateDate', 'date')
                ->add('Title', 'text')
                ->add('save', 'submit')
                ->getForm();

        return $this->render('VisionsDocBundle:Content:form.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    /**
     * Form to create content elements
     * 
     * @Route("/show/{id}")
     * @Template()
     */
    public function showAction($id) {
        $content = $this->getDoctrine()
                ->getRepository('VisionsDocBundle:Content')
                ->find($id);

        if (!$content) {
            throw $this->createNotFoundException(
                    'No content found '
            );
        }

        // create form
        $form = $this->createFormBuilder($content)
                ->add('Id', 'guid')
                ->add('CreateDate', 'date')
                ->add('Title', 'string')
                ->add('save', 'submit')
                ->getForm();

        return $this->render('VisionsDocBundle:Content:form.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    /**
     * Generate Guid
     * 
     * @return string
     */
    private function getGUID() {
        if (function_exists('com_create_guid')) {
            return com_create_guid();
        } else {
            mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45); // "-"
            $uuid = substr($charid, 0, 8) . $hyphen
                    . substr($charid, 8, 4) . $hyphen
                    . substr($charid, 12, 4) . $hyphen
                    . substr($charid, 16, 4) . $hyphen
                    . substr($charid, 20, 12);
            return $uuid;
        }
    }

    private function getObjectAsArray($object) {
        return (array) $object;
    }

}

