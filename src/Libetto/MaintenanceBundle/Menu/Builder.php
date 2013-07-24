<?php

// src/Libetto/MaintenanceBundle/Menu/Builder.php

namespace Libetto\MaintenanceBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware {

    public function mainMenu(FactoryInterface $factory, array $options) {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');

// ANONYM
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED') === false) {
            //$menu->addChild('Anmelden', array('route' => 'fos_user_security_login'))->setAttribute('icon', 'icon-user');
        } else {
            $menu->addChild('Tabellen')
                    ->setAttribute('dropdown', true)
                    ->setAttribute('divider_prepend', true);
// ROLE USER OR ADMIN
//            $menu['User']->addChild('Passwort ändern', array('route' => 'fos_user_change_password'))->setAttribute('icon', 'icon-edit');

// ROLE ADMIN
            if ($this->container->get('security.context')->isGranted('ROLE_ADMIN') === true) {
                $menu['Tabellen']->addChild('Verwaltung', array('route' => 'maintenance_homepage'))->setAttribute('icon', 'icon-home');
                $menu['Tabellen']->addChild('Master Tabelle - Liste', array('route' => 'master_list'))->setAttribute('icon', 'icon-list');
                $menu['Tabellen']->addChild('Master Tabelle - Neues Feld', array('route' => 'master_edit'))->setAttribute('icon', 'icon-plus');
            }
        }
        return $menu;
    }

}