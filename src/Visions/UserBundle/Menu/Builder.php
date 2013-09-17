<?php

// src/Visions/UserBundle/Menu/Builder.php

namespace Visions\UserBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware {

    public function mainMenu(FactoryInterface $factory, array $options) {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');
        
// ANONYM
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED') === false) {
            $menu->addChild($this->container->get('translator')->trans('user.default.Login', array(), 'navigation'), array('route' => 'fos_user_security_login'))->setAttribute('icon', 'icon-user');
        } else {
            $rootName = $this->container->get('translator')->trans('user.default.My account', array(), 'navigation');
            $menu->addChild($rootName)
                    ->setAttribute('dropdown', true)
                    ->setAttribute('divider_prepend', true);
// ROLE USER OR ADMIN
            $menu[$rootName]->addChild($this->container->get('translator')->trans('user.default.Change Password', array(), 'navigation'), array('route' => 'fos_user_change_password'))->setAttribute('icon', 'icon-edit');
            $menu[$rootName]->addChild($this->container->get('translator')->trans('user.default.Register', array(), 'navigation'), array('route' => 'fos_user_registration_register'))->setAttribute('icon', 'icon-plus');
            $menu[$rootName]->addChild($this->container->get('translator')->trans('user.default.Profile', array(), 'navigation'), array('route' => 'fos_user_profile_show'))->setAttribute('icon', 'icon-user');
            $menu[$rootName]->addChild($this->container->get('translator')->trans('user.default.Edit Profile', array(), 'navigation'), array('route' => 'fos_user_profile_edit'))->setAttribute('icon', 'icon-user');
            $menu[$rootName]->addChild($this->container->get('translator')->trans('user.default.Logout', array(), 'navigation'), array('route' => 'fos_user_security_logout'))->setAttribute('icon', 'icon-off');

// ROLE ADMIN
            if ($this->container->get('security.context')->isGranted('ROLE_ADMIN') === true) {
                //$menu['User']->addChild('ADMIN', array('uri' => '#'))->setAttribute('icon', 'icon-off');
                //$menu['User']->addChild('Gruppen Liste', array('route' => 'fos_user_group_list'))->setAttribute('icon', 'icon-list');
                //$menu['User']->addChild('Gruppe anlegen', array('route' => 'fos_user_group_new'))->setAttribute('icon', 'icon-list');
            }            
        }
        return $menu;
    }

}