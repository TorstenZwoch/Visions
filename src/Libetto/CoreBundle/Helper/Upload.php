<?php
namespace Libetto\CoreBundle\Helper;

use Symfony\Components\Templating\Helper\Helper;

class Upload extends Helper {

    public function getName()
    {
        return 'upload';
    }
    
    public function uploadAction(Request $request) {
        $document = new Document();
        $form = $this->createFormBuilder($document)
                ->add('file')
                ->getForm();

        $request = $this->getRequest();
        $form->handleRequest($request);

        if ($form->isValid()) {
            

           // return $this->redirect($this->generateUrl('file_upload'));
        }

        return array('form' => $form->createView());
    }

}
