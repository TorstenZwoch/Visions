<?php

// src/Visions/VisionBundle/Form/Type/HtmlEditorType.php
namespace Visions\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HtmlEditorType extends AbstractType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'label' => 'Description'
        ));
    }

    public function getParent()
    {
        return 'textarea';
    }

    public function getName()
    {
        return 'htmlEditor';
    }
}


//$decoded=base64_decode($encodedString);
//
//file_put_contents('newImage.JPG',$decoded);
?>
