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
class ProductTextController extends Controller {

    /**
     * Lists all ProductText entities.
     *
     * @Route("/product/{productid}", name="producttext")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($productid) {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LibettoItemBundle:ProductText')->findBy(array("rProduct" => $productid));
        $product = $em->getRepository('LibettoItemBundle:Product')->find($productid);

        return array(
            'entities' => $entities,
            'product' => $product,
        );
    }

    /**
     * Creates a new ProductText entity.
     *
     * @Route("/", name="producttext_create")
     * @Method("POST")
     * @Template("LibettoItemBundle:ProductText:new.html.twig")
     */
    public function createAction(Request $request) {
        
        $entity = new ProductText();
        $form = $this->createForm(new ProductTextType(), $entity);
        $form->submit($request);

        if ($form->isValid()) {

            $product = $this->getDoctrine()->getRepository("LibettoItemBundle:Product")->find($entity->getRProduct());
            $entity->setProduct($product);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('producttext_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new ProductText entity.
     *
     * @Route("/product/{productid}/new", name="producttext_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($productid) {
        $entity = new ProductText();
        $entity->setRProduct($productid);
        $form = $this->createForm(new ProductTextType(), $entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a ProductText entity.
     *
     * @Route("/{id}", name="producttext_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoItemBundle:ProductText')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductText entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
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
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LibettoItemBundle:ProductText')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductText entity.');
        }

        $editForm = $this->createForm(new ProductTextType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
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
    public function updateAction(Request $request, $id) {
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

            return $this->redirect($this->generateUrl('producttext_show', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a ProductText entity.
     *
     * @Route("/{id}", name="producttext_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        $url = $this->generateUrl('product');

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LibettoItemBundle:ProductText')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProductText entity.');
            }

            $url = $this->generateUrl('producttext', array('productid' => $entity->getRProduct()));
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($url);
    }

    /**
     * Creates a form to delete a ProductText entity by id.
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
