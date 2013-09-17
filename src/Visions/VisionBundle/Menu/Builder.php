<?php

// src/Visions/VisionBundle/Menu/Builder.php

namespace Visions\VisionBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware {

    public function mainMenu(FactoryInterface $factory, array $options) {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');
        $menu->addChild('Content')
                ->setAttribute('dropdown', true)
                ->setAttribute('divider_prepend', true);
        $menu['Content']->addChild('Liste', array('route' => 'content'))->setAttribute('icon', 'icon-list');
        $menu['Content']->addChild('Neu', array('route' => 'content_new'))->setAttribute('icon', 'icon-plus');
        //$menu['Content']->addChild('Bearbeiten', array('route' => 'content_edit'))->setAttribute('icon', 'icon-edit');

        return $menu;
    }

    public function userMenu(FactoryInterface $factory, array $options) {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');


        /*
          You probably want to show user specific information such as the username here. That's possible! Use any of the below methods to do this.

          if($this->container->get('security.context')->isGranted(array('ROLE_ADMIN', 'ROLE_USER'))) {} // Check if the visitor has any authenticated roles
          $username = $this->container->get('security.context')->getToken()->getUser()->getUsername(); // Get username of the current logged in user

         */
        $menu->addChild('User', array('label' => 'Hi visitor'))
                ->setAttribute('dropdown', true)
                ->setAttribute('icon', 'icon-user');

        $menu['User']->addChild('Edit profile', array('route' => '_welcome'))
                ->setAttribute('icon', 'icon-search');

        return $menu;
    }

    public function AdminMenu(FactoryInterface $factory, array $options) {
        $menu = $factory->createItem('User');
        $menu->addChild('HomeAdmin', array('route' => '_welcome'));
        $menu->addChild('Comments2', array('uri' => '#comments'));
        $menu->addChild('Symfony2', array('uri' => 'http://symfony-reloaded.org/'));
        return $menu;
    }

}