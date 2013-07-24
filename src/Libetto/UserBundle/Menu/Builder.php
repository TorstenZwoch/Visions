<?php

// src/Libetto/UserBundle/Menu/Builder.php

namespace Libetto\UserBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware {

    public function mainMenu(FactoryInterface $factory, array $options) {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');
        
// ANONYM
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED') === false) {
            $menu->addChild('Anmelden', array('route' => 'fos_user_security_login'))->setAttribute('icon', 'icon-user');
        } else {
            $menu->addChild('User')
                    ->setAttribute('dropdown', true)
                    ->setAttribute('divider_prepend', true);
// ROLE USER OR ADMIN
            $menu['User']->addChild('Passwort ändern', array('route' => 'fos_user_change_password'))->setAttribute('icon', 'icon-edit');
            $menu['User']->addChild('Registrieren', array('route' => 'fos_user_registration_register'))->setAttribute('icon', 'icon-plus');
            $menu['User']->addChild('Profil', array('route' => 'fos_user_profile_show'))->setAttribute('icon', 'icon-user');
            $menu['User']->addChild('Profil bearbeiten', array('route' => 'fos_user_profile_edit'))->setAttribute('icon', 'icon-user');
            $menu['User']->addChild('Abmelden', array('route' => 'fos_user_security_logout'))->setAttribute('icon', 'icon-off');

// ROLE ADMIN
            if ($this->container->get('security.context')->isGranted('ROLE_ADMIN') === true) {
                $menu['User']->addChild('ADMIN', array('uri' => '#'))->setAttribute('icon', 'icon-off');
                //$menu['User']->addChild('Gruppen Liste', array('route' => 'fos_user_group_list'))->setAttribute('icon', 'icon-list');
                //$menu['User']->addChild('Gruppe anlegen', array('route' => 'fos_user_group_new'))->setAttribute('icon', 'icon-list');
            }            
        }
        return $menu;
    }

}