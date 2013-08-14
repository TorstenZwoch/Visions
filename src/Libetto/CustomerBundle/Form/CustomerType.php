<?php

namespace Libetto\CustomerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType {

    //Verhindern der Anzeige des Wertes im Formular
    // , 'hidden', array('data' => '501', 'property_path' => null)

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $transPrafix = "customer.customer.form.label.";
        $builder
                ->add('cNumber', null, array('label' => $transPrafix . 'Number'))
                ->add('cInfo', null, array('label' => $transPrafix . 'Info'))
                ->add('invoiceContact', 'entity', array(
                    'class' => 'LibettoContactBundle:Contact',
                    'property' => 'cLanguage',
                    'label' => $transPrafix . 'InvoiceContact'
                        )
                )
                ->add('contact', 'entity', array(
                    'class' => 'LibettoContactBundle:Contact',
                    'property' => 'cLanguage',
                    'label' => $transPrafix . 'Contact'
                        )
                )                
                ->add('rContactGroup', null, array('label' => $transPrafix . 'ContactGroup'))
                ->add('rTermsOfPayment', null, array('label' => $transPrafix . 'TermsOfPayment'))
                ->add('rPricelist', null, array('label' => $transPrafix . 'Pricelist'))
        ;

        $builder
                ->remove('cComp')
                ->remove('cCreationDate')
                ->remove('cModifyDate')
                ->remove('cCreationUser')
                ->remove('cModifyUser')
                ->remove('isDeleted')
                ->remove('rInvoiceContact')
                ->remove('rContact')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Libetto\CustomerBundle\Entity\Customer'
        ));
    }

    public function getName() {
        return 'libetto_customerbundle_customertype';
    }

}
