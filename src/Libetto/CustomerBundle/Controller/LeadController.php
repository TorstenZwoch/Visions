<?php

namespace Libetto\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Libetto\CustomerBundle\Entity\Lead;
use Libetto\CustomerBundle\Form\LeadType;

/**
 * Lead controller.
 *
 * @Route("/lead")
 */
class LeadController extends Controller
{

    /**
     * Lists all Lead entities.
     *
     * @Route("/", name="lead")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LibettoCustomerBundle:Lead')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Lead entity.
     *
     * @Route("/", name="lead_create")
     * @Method("POST")
     * @Template("LibettoCustomerBundle:Lead:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Lead();
        $form = $this->createForm(new LeadType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lead_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Lead entity.
     *
     * @Route("/new", name="lead_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Lead();
        $form   = $this->createForm(new LeadType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Lead entity.
     *
     * @Route("/{id}", name="lead_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoCustomerBundle:Lead')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lead entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Lead entity.
     *
     * @Route("/{id}/edit", name="lead_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoCustomerBundle:Lead')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lead entity.');
        }

        $editForm = $this->createForm(new LeadType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Lead entity.
     *
     * @Route("/{id}", name="lead_update")
     * @Method("PUT")
     * @Template("LibettoCustomerBundle:Lead:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoCustomerBundle:Lead')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lead entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new LeadType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lead_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Lead entity.
     *
     * @Route("/{id}", name="lead_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LibettoCustomerBundle:Lead')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Lead entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lead'));
    }

    /**
     * Creates a form to delete a Lead entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
