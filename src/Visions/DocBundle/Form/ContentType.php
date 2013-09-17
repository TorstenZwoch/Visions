<?php

namespace Visions\DocBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Visions\CoreBundle\Form\Type\HtmlEditorType;
use Visions\CoreBundle\Form\Type\LiveEditorType;

class ContentType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title')
                ->add('tags')
                ->add('language')
                ->add('format')
                ->add('online')
                ->add('text', new LiveEditorType());
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Visions\DocBundle\Entity\Content'
        ));
    }

    public function getName() {
        return 'visions_docbundle_contenttype';
    }

}
