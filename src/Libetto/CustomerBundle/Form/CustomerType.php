<?php

namespace Libetto\CustomerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType {

    //Verhindern der Anzeige des Wertes im Formular
    // , 'hidden', array('data' => '501', 'property_path' => null)

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('cComp')
                ->add('cCreationDate')
                ->add('cModifyDate')
                ->add('cCreationUser')
                ->add('cModifyUser')
                ->add('isDeleted')
                ->add('cNumber')
                ->add('cInfo')
                ->add('rInvoiceContact')
                ->add('invoiceContact', 'entity', array(
                    'class' => 'LibettoContactBundle:Contact',
                    'property' => 'cLanguage'
                        )
                )
                ->add('rContactGroup')
                ->add('rTermsOfPayment')
                ->add('rPricelist')
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
