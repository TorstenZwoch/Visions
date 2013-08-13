<?php

namespace Libetto\CustomerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LeadType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        $transPrafix = "customer.lead.form.label.";
        $builder
                ->add('cNumber', null, array('label' => $transPrafix . 'Number'))
                ->add('cInfo', null, array('label' => $transPrafix . 'Info'))
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
                ->remove('rContact')
        ;        
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Libetto\CustomerBundle\Entity\Lead'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'libetto_customerbundle_leadtype';
    }
}
