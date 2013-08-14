<?php

// src/Libetto/SupplierBundle/Menu/Builder.php

namespace Libetto\SupplierBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware {

    public function mainMenu(FactoryInterface $factory, array $options) {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');
$rootName = $this->container->get('translator')->trans('supplier.supplier.Supplier', array(), 'navigation');
// ANONYM
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED') === false) {
            //$menu->addChild('Anmelden', array('route' => 'fos_user_security_login'))->setAttribute('icon', 'icon-user');
        } else {
            $menu->addChild($this->container->get('translator')->trans('supplier.supplier.Supplier', array(), 'navigation'))
                    ->setAttribute('dropdown', true)
                    ->setAttribute('divider_prepend', true);
// ROLE USER OR ADMIN
//            $menu['User']->addChild('Passwort ändern', array('route' => 'fos_user_change_password'))->setAttribute('icon', 'icon-edit');

// ROLE ADMIN
            if ($this->container->get('security.context')->isGranted('ROLE_ADMIN') === true) {
                $menu[$rootName]
                        ->addChild($this->container->get('translator')->trans('supplier.supplier.Supplier list', array(), 'navigation'), array('route' => 'supplier'))
                        ->setAttribute('icon', 'icon-home');
                $menu[$rootName]
                        ->addChild($this->container->get('translator')->trans('supplier.lead.SupplierLead list', array(), 'navigation'), array('route' => 'supplierlead'))
                        ->setAttribute('icon', 'icon-home');
            }
        }
        return $menu;
    }

}