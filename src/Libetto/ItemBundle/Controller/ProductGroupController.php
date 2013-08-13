<?php

namespace Libetto\ItemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Libetto\ItemBundle\Entity\ProductGroup;
use Libetto\ItemBundle\Form\ProductGroupType;

/**
 * ProductGroup controller.
 *
 * @Route("/productgroup")
 */
class ProductGroupController extends Controller
{

    /**
     * Lists all ProductGroup entities.
     *
     * @Route("/", name="productgroup")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LibettoItemBundle:ProductGroup')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ProductGroup entity.
     *
     * @Route("/", name="productgroup_create")
     * @Method("POST")
     * @Template("LibettoItemBundle:ProductGroup:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new ProductGroup();
        $form = $this->createForm(new ProductGroupType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('productgroup_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new ProductGroup entity.
     *
     * @Route("/new", name="productgroup_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ProductGroup();
        $form   = $this->createForm(new ProductGroupType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ProductGroup entity.
     *
     * @Route("/{id}", name="productgroup_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoItemBundle:ProductGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ProductGroup entity.
     *
     * @Route("/{id}/edit", name="productgroup_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoItemBundle:ProductGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductGroup entity.');
        }

        $editForm = $this->createForm(new ProductGroupType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing ProductGroup entity.
     *
     * @Route("/{id}", name="productgroup_update")
     * @Method("PUT")
     * @Template("LibettoItemBundle:ProductGroup:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoItemBundle:ProductGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProductGroupType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('productgroup_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ProductGroup entity.
     *
     * @Route("/{id}", name="productgroup_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LibettoItemBundle:ProductGroup')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProductGroup entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('productgroup'));
    }

    /**
     * Creates a form to delete a ProductGroup entity by id.
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
