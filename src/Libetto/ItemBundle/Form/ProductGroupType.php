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
                ->add('cNumber', null, array('label' => "ItemBundle.ProductGroup.Number"))
                ->add('cName', null, array('label' => "ItemBundle.ProductGroup.Name"))
                ->add('cSort', null, array('label' => "ItemBundle.ProductGroup.Sort"))
                ->add('cIsSalesDiscountable', null, array('required' => false, 'label' => "ItemBundle.ProductGroup.IsSalesDiscountable"))
                ->add('cIsCashDiscountable', null, array('required' => false, 'label' => "ItemBundle.ProductGroup.IsCashDiscountable"))
                ->add('rTaxId', null, array('required' => false, 'label' => "ItemBundle.ProductGroup.TaxId"))
                ->add('cDecimalPlacePrice', null, array('required' => false, 'label' => "ItemBundle.ProductGroup.DecimalPlacePrice"))
                ->add('cDecimalPlaceQuantity', null, array('required' => false, 'label' => "ItemBundle.ProductGroup.DecimalPlaceQuantity"));
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
