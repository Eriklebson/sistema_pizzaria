<?php 
    return [
        'POST' => [
            '/login' => 'Login@login',
        ],
        'GET' => [
            //Site
            '/' => 'Home@index',
            '/menu' => 'Home@menu',
            '/about' => 'Home@about',
            '/contact' => 'Home@contact',
            '/login' => 'Login@index',
            '/generateOrder' => 'Home@generateOrder',
            '/finalizeOrder' => 'FinalizeOrder@index',
            '/product/[0-9]+' => 'Product@index',

            //Painel de controle
            '/dashboard/[0-9]+/'=> 'Dashboard@index',
            '/dashboard/[0-9]+/category'=> 'Dashboard@category',
            '/dashboard/[0-9]+/products'=> 'Dashboard@products',
            '/dashboard/[0-9]+/paidOrders'=> 'Dashboard@paidOrders',
            '/dashboard/[0-9]+/pendingOrders'=> 'Dashboard@pendingOrders',
            '/dashboard/[0-9]+/completedOrders'=> 'Dashboard@completedOrders',
            '/dashboard/[0-9]+/clients'=> 'Dashboard@clients',
            '/dashboard/[0-9]+/users'=> 'Users@index',
            '/dashboard/[0-9]+/editUser/[0-9]+'=> 'Users@edit',
            '/dashboard/[0-9]+/selfConfig'=> 'Dashboard@selfConfig',
            '/logout' => 'Login@destroy',
        ]
    ];
?>