<?php

// src/Libetto/CustomerBundle/Menu/Builder.php

namespace Libetto\CustomerBundle\Menu;

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
            $menu->addChild('Customer')
                    ->setAttribute('dropdown', true)
                    ->setAttribute('divider_prepend', true);
// ROLE USER OR ADMIN
//            $menu['User']->addChild('Passwort ändern', array('route' => 'fos_user_change_password'))->setAttribute('icon', 'icon-edit');

// ROLE ADMIN
            if ($this->container->get('security.context')->isGranted('ROLE_ADMIN') === true) {
                $menu['Customer']->addChild('Verwaltung', array('route' => 'customer'))->setAttribute('icon', 'icon-home');
            }
        }
        return $menu;
    }

}