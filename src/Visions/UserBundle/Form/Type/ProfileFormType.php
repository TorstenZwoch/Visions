<?php

namespace Visions\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class ProfileFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->add('redmineAPIKey')
                ->add('redmineAPIUrl')
                ->add('redmineAPIPort');
    }

    public function getName()
    {
        return 'visions_user_profile';
    }
}