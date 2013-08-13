<?php

namespace Libetto\ItemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cComp')
            ->add('cCreationDate')
            ->add('cModifyDate')
            ->add('cCreationUser')
            ->add('cModifyUser')
            ->add('isDeleted')
            ->add('cNumber')
            ->add('cName')
            ->add('cShortName')
            ->add('cDescription')
            ->add('rCategory')
            ->add('rProductGroup')
            ->add('category')
            ->add('productGroup');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Libetto\ItemBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'libetto_itembundle_producttype';
    }
}
