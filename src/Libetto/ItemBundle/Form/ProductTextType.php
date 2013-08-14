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
            ->add('cComp')
            ->add('cCreationDate')
            ->add('cModifyDate')
            ->add('cCreationUser')
            ->add('cModifyUser')
            ->add('isDeleted')
            ->add('rProduct')
            ->add('cLanguage')
            ->add('cName')
            ->add('cShortName')
            ->add('cDescription')
            ->add('cDescriptionType')
            ->add('product');
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
