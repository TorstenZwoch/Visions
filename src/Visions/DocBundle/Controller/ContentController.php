<?php

namespace Visions\DocBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Visions\DocBundle\Entity\Content;
use Visions\DocBundle\Form\ContentType;

/**
 * Content controller.
 *
 * @Route("/content")
 */
class ContentController extends Controller {

    /**
     * Lists all Content entities.
     *
     * @Route("/", name="content")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VisionsDocBundle:Content')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Content entity.
     *
     * @Route("/", name="content_create")
     * @Method("POST")
     * @Template("VisionsDocBundle:Content:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Content();
        $entity->setCreationUser($this->get('security.context')->getToken()->getUser()->getId());
        $form = $this->createForm(new ContentType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('content_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Content entity.
     *
     * @Route("/new", name="content_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new Content();
        $form = $this->createForm(new ContentType(), $entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Content entity.
     *
     * @Route("/{id}", name="content_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VisionsDocBundle:Content')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Content entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Content entity.
     *
     * @Route("/{id}/edit", name="content_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VisionsDocBundle:Content')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Content entity.');
        }

        $editForm = $this->createForm(new ContentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Content entity.
     *
     * @Route("/{id}", name="content_update")
     * @Method("PUT")
     * @Template("VisionsDocBundle:Content:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('VisionsDocBundle:Content')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Content entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContentType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $content = $entity->getText();
            preg_match("/<img[^>]+\>/i", $entity->getText(), &$images);

            $content = $this->saveImage($images, $content);

            $entity->setText($content);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('content_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    private function saveImage($images, $content) {
        $fs = new Filesystem();
        $path = $this->get('kernel')->getRootDir() . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'tmp';
        // this directory exists, return true
        if ($fs->exists($path)) {
            try {
                foreach ($images as $image) {
                    if (substr_count($image, 'base64') > 0) {
                        $imageData = str_replace('<img src="', '', $image);
                        $imageData = str_replace('">', '', $imageData);

                        list($imageType, $imageData) = explode(';', $imageData);
                        list(, $imageData) = explode(',', $imageData);   // Image
                        list(, $imageType) = explode('/', $imageType);   // Type
                        $imageData = base64_decode($imageData);
                        $imageName = "img_" . uniqid() . '.' . $imageType;
                        $imagePath = $path . DIRECTORY_SEPARATOR . $imageName;
                        $fs->dumpFile($imagePath, $imageData);
                        $image = "<img src='/projects/Visions/web/tmp/" . $imageName . "' />";
                        $content = preg_replace("/<img[^>]+\>/i", $image, $content, 1);
                    }
                }
            } catch (IOException $e) {
                echo "An error occurred while creating your directory";
            }
        } else {
            throw new \Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException();
        }
        return($content);
    }

    /**
     * Deletes a Content entity.
     *
     * @Route("/{id}", name="content_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('VisionsDocBundle:Content')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Content entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('content'));
    }

    /**
     * Creates a form to delete a Content entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm()
        ;
    }

    function base64_to_jpeg($base64_string, $output_file) {
        $var = __DIR__ . '\..\..\..\..\web\docs';

        $ifp = fopen($var . $output_file, "w+");

        $data = explode(',', $base64_string);

        fwrite($ifp, base64_decode($data[1]));
        fclose($ifp);

        return $output_file;
    }

}
