<?php

namespace Libetto\MaintenanceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Libetto\MaintenanceBundle\Entity\Master as Master;

class MasterType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('id','hidden', array('required' => false))
                ->add('tablename')
                ->add('fieldname')
                ->add('type','choice',array('choices'=>Master::$sqlDataTypes))
                ->add('isindex','checkbox', array('required' => false))
                ->add('isunique','checkbox', array('required' => false))
                ->add('orderid','integer',array('attr'=>array('min'=>1,'max'=>'255')))
                
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Libetto\MaintenanceBundle\Entity\Master'
        ));
    }

    public function getName() {
        return 'libetto_maintenancebundle_mastertype';
    }

    

}
