<?php

namespace Libetto\ItemBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Libetto\ItemBundle\Entity\ProductText;
use Libetto\ItemBundle\Form\ProductTextType;

/**
 * ProductText controller.
 *
 * @Route("/producttext")
 */
class ProductTextController extends Controller
{

    /**
     * Lists all ProductText entities.
     *
     * @Route("/", name="producttext")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LibettoItemBundle:ProductText')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ProductText entity.
     *
     * @Route("/", name="producttext_create")
     * @Method("POST")
     * @Template("LibettoItemBundle:ProductText:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new ProductText();
        $form = $this->createForm(new ProductTextType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('producttext_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new ProductText entity.
     *
     * @Route("/new", name="producttext_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ProductText();
        $form   = $this->createForm(new ProductTextType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ProductText entity.
     *
     * @Route("/{id}", name="producttext_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoItemBundle:ProductText')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductText entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ProductText entity.
     *
     * @Route("/{id}/edit", name="producttext_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoItemBundle:ProductText')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductText entity.');
        }

        $editForm = $this->createForm(new ProductTextType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing ProductText entity.
     *
     * @Route("/{id}", name="producttext_update")
     * @Method("PUT")
     * @Template("LibettoItemBundle:ProductText:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoItemBundle:ProductText')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductText entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ProductTextType(), $entity);
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('producttext_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ProductText entity.
     *
     * @Route("/{id}", name="producttext_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LibettoItemBundle:ProductText')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProductText entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('producttext'));
    }

    /**
     * Creates a form to delete a ProductText entity by id.
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
