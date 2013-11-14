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

        $menu->addChild(
            'Homework #5',
            array(
                'route' => 'generated_posts',
                'routeParameters' => array(
                    'count' => rand(1, 10)
                )
            )
        );


        return $menu;
    }
}