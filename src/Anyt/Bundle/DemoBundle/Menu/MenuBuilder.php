<?php

namespace Anyt\Bundle\DemoBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;


class MenuBuilder extends ContainerAware
{

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem(
            'root',
            array(
                'navbar' => true,
            )
        );

        $menu->addChild(
            'Homework #4',
            array(
                'route' => 'home',
            )
        );


        return $menu;
    }
}