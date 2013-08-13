<?php

namespace Libetto\SupplierBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Libetto\SupplierBundle\Entity\SupplierLead;
use Libetto\SupplierBundle\Form\SupplierLeadType;

/**
 * SupplierLead controller.
 *
 * @Route("/supplierlead")
 */
class SupplierLeadController extends Controller
{

    /**
     * Lists all SupplierLead entities.
     *
     * @Route("/", name="supplierlead")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LibettoSupplierBundle:SupplierLead')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new SupplierLead entity.
     *
     * @Route("/", name="supplierlead_create")
     * @Method("POST")
     * @Template("LibettoSupplierBundle:SupplierLead:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new SupplierLead();
        $form = $this->createForm(new SupplierLeadType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('supplierlead_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new SupplierLead entity.
     *
     * @Route("/new", name="supplierlead_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new SupplierLead();
        $form   = $this->createForm(new SupplierLeadType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a SupplierLead entity.
     *
     * @Route("/{id}", name="supplierlead_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoSupplierBundle:SupplierLead')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SupplierLead entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing SupplierLead entity.
     *
     * @Route("/{id}/edit", name="supplierlead_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoSupplierBundle:SupplierLead')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SupplierLead entity.');
        }

        $editForm = $this->createForm(new SupplierLeadType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing SupplierLead entity.
     *
     * @Route("/{id}", name="supplierlead_update")
     * @Method("PUT")
     * @Template("LibettoSupplierBundle:SupplierLead:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoSupplierBundle:SupplierLead')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SupplierLead entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SupplierLeadType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('supplierlead_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a SupplierLead entity.
     *
     * @Route("/{id}", name="supplierlead_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LibettoSupplierBundle:SupplierLead')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SupplierLead entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('supplierlead'));
    }

    /**
     * Creates a form to delete a SupplierLead entity by id.
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
