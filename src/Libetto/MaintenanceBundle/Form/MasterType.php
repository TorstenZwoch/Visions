<?php

namespace Libetto\MaintenanceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Libetto\MaintenanceBundle\Entity\Master as Master;

class MasterType extends AbstractType {
    private $back_url = "";
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('cId',        'hidden',   array('required' => false))
                ->add('cTableName', 'text',     array('label'=>'Tabellen-Name'))
                ->add('cFieldName', 'text',     array('label'=>'Feld-Name'))
                ->add('cType',      'choice',   array('label'=>'Typ','choices'=>Master::$sqlDataTypes))
                ->add('cIsIndex',   'checkbox', array('label'=>'Ist Index','required' => false))
                ->add('cIsUnique',  'checkbox', array('label'=>'Ist Unique','required' => false))
                ->add('cOrderId',   'integer',  array('label'=>'Sortierreihenfolge','attr'=>array('min'=>1,'max'=>'255')))
                ->add('btExit',     'button',   array('label'=>'Abbrechen','attr'=>array('class'=>'btn-warning','onclick'=>"location.href='".$this->back_url."'")))
                ->add('btSaveExit', 'submit',   array('label'=>'Speichern und Ende','attr'=>array('class'=>'btn-success')))
                ->add('btSaveNew',  'submit',   array('label'=>'Speichern und Neu','attr'=>array('class'=>'btn-success')))
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
    
    public function setBackUrl($url){
        $this->back_url = $url;
    }

}
