<?php

namespace Libetto\ItemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductGroupType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('cNumber', null, array('label' => "item.productgroup.label.Number"))
                ->add('cName', null, array('label' => "item.productgroup.label.Name"))
                ->add('cSort', null, array('label' => "item.productgroup.label.Sort"))
                ->add('cIsSalesDiscountable', null, array('required' => false, 'label' => "item.productgroup.label.IsSalesDiscountable"))
                ->add('cIsCashDiscountable', null, array('required' => false, 'label' => "item.productgroup.label.IsCashDiscountable"))
                ->add('rTaxId', null, array('required' => false, 'label' => "item.productgroup.label.TaxId"))
                ->add('cDecimalPlacePrice', null, array('required' => false, 'label' => "item.productgroup.label.DecimalPlacePrice"))
                ->add('cDecimalPlaceQuantity', null, array('required' => false, 'label' => "item.productgroup.label.DecimalPlaceQuantity"));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Libetto\ItemBundle\Entity\ProductGroup'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'libetto_itembundle_productgrouptype';
    }

}
