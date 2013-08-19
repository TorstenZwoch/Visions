<?php

namespace Libetto\SupplierBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SupplierType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transPrafix = "supplier.supplier.form.label.";
        $builder
            ->add('cNumber',null, array('label' => $transPrafix . 'Number'))
                
            ->add('contact', null, array('required' => false,'label' => $transPrafix . 'Contact'))
            ->add('invoiceContact', null, array('required' => false,'label' => $transPrafix . 'InvoiceContact'))
                
            ->add('cInfo',null, array('required' => false,'label' => $transPrafix . 'Info'))
            ->add('rContactGroup',null, array('required' => false,'label' => $transPrafix . 'ContactGroup'))
            ->add('rTermsOfPayment',null, array('required' => false,'label' => $transPrafix . 'TermsOfPayment'))
            ->add('rPricelist',null, array('required' => false,'label' => $transPrafix . 'PriceList'));
        
        $builder
                
                ->remove('cComp')
                ->remove('cCreationDate')
                ->remove('cModifyDate')
                ->remove('cCreationUser')
                ->remove('cModifyUser')
                ->remove('isDeleted')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Libetto\SupplierBundle\Entity\Supplier'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'libetto_supplierbundle_suppliertype';
    }
}
