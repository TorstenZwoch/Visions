<?php

namespace Libetto\ItemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('cNumber', null, array('label' => "item.category.label.Number"))
                ->add('cName', null, array('label' => "item.category.label.Name"))
                ->add('parentCategory', null, array('label' => "item.category.label.ParentCategory"))
                ->add('cSort', null, array('label' => "item.category.label.Sort"));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Libetto\ItemBundle\Entity\Category'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'libetto_itembundle_categorytype';
    }

}
