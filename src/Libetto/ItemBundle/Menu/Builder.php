<?php

// src/Libetto/CustomerBundle/Menu/Builder.php

namespace Libetto\ItemBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware {

    public function mainMenu(FactoryInterface $factory, array $options) {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');
        $menu->setAttribute('dropdown', true);
        $menu->setAttribute('divider_prepend', true);


        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED') === false) {
            // ANONYM
        } else {
            // ROLE USER OR ADMIN

            $itemMenu = $factory->createItem($this->container->get('translator')->trans('item.navigation.Product'));
            $itemMenu->addChild($factory->createItem($this->container->get('translator')->trans('item.navigation.ProductList'),array('route' => 'product'))->setAttribute('icon', 'icon-thumbs-up'));
            $itemMenu->addChild($factory->createItem($this->container->get('translator')->trans('item.navigation.ProductGroupList'),array('route' => 'productgroup'))->setAttribute('icon', 'icon-thumbs-up'));
            $itemMenu->addChild($factory->createItem($this->container->get('translator')->trans('item.navigation.CategoryList'),array('route' => 'category'))->setAttribute('icon', 'icon-thumbs-up'));
            $itemMenu->addChild($factory->createItem($this->container->get('translator')->trans('item.navigation.ProductTextList'),array('route' => 'producttext'))->setAttribute('icon', 'icon-thumbs-up'));
            $itemMenu->addChild($factory->createItem($this->container->get('translator')->trans('item.navigation.MediaList'),array('route' => 'media'))->setAttribute('icon', 'icon-thumbs-up'));
            $menu->addChild($itemMenu);

            if ($this->container->get('security.context')->isGranted('ROLE_ADMIN') === true) {
                // ROLE ADMIN
            }
        }
        return $menu;
    }

}