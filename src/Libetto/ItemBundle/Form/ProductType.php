<?php

namespace Libetto\ItemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('cNumber', null, array('label' => "item.product.label.Number"))
                ->add('cName', null, array('label' => "item.product.label.Name"))
                ->add('cShortName', null, array('label' => "item.product.label.ShortName"))
                ->add('cDescription', null, array('label' => "item.product.label.Description"))
                ->add('category', null, array('required' => true, 'label' => "item.product.label.Category"))
                ->add('productGroup', null, array('required' => true, 'label' => "item.product.label.ProductGroup"));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Libetto\ItemBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'libetto_itembundle_producttype';
    }

}
