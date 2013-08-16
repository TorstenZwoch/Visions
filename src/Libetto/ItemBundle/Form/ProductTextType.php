<?php

namespace Libetto\ItemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductTextType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cLanguage', null, array('label' => "item.producttext.label.Language"))
            ->add('cName', null, array('label' => "item.producttext.label.Name"))
            ->add('cShortName', null, array('label' => "item.producttext.label.ShortName"))
            ->add('cDescription', null, array('label' => "item.producttext.label.Description"))
            ->add('cDescriptionType', null, array('label' => "item.producttext.label.DescriptionType"))
            ->add('rProduct','hidden');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Libetto\ItemBundle\Entity\ProductText'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'libetto_itembundle_producttexttype';
    }
}
