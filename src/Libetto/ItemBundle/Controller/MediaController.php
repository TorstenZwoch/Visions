<?php

namespace Libetto\ItemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Libetto\ItemBundle\Entity\Media;
use Libetto\ItemBundle\Form\MediaType;

/**
 * Media controller.
 *
 * @Route("/media")
 */
class MediaController extends Controller {

    /**
     * Lists all Media entities.
     *
     * @Route("/product/{productid}", name="media")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($productid) {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LibettoItemBundle:Media')->findAll();
        $product = $em->getRepository('LibettoItemBundle:Product')->find($productid);

        return array(
            'entities' => $entities,
            'product' => $product,
        );
    }

    /**
     * Creates a new Media entity.
     *
     * @Route("/", name="media_create")
     * @Method("POST")
     * @Template("LibettoItemBundle:Media:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Media();
        $form = $this->createForm(new MediaType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {

            $product = $this->getDoctrine()->getRepository("LibettoItemBundle:Product")->find($entity->getRRefId());
            $entity->setProduct($product);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('media_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Media entity.
     *
     * @Route("/product/{productid}/new", name="media_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($productid) {
        $entity = new Media();
        $entity->setRRefId($productid);
        $form = $this->createForm(new MediaType(), $entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Media entity.
     *
     * @Route("/{id}", name="media_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoItemBundle:Media')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Media entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Media entity.
     *
     * @Route("/{id}/edit", name="media_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoItemBundle:Media')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Media entity.');
        }

        $editForm = $this->createForm(new MediaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Media entity.
     *
     * @Route("/{id}", name="media_update")
     * @Method("PUT")
     * @Template("LibettoItemBundle:Media:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoItemBundle:Media')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Media entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MediaType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('media_show', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Media entity.
     *
     * @Route("/{id}", name="media_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->submit($request);
        
        $url = $this->generateUrl('product');

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LibettoItemBundle:Media')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Media entity.');
            }

            $url = $this->generateUrl('media', array('productid' => $entity->getRRefId()));
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($url);
    }

    /**
     * Creates a form to delete a Media entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm()
        ;
    }

}
