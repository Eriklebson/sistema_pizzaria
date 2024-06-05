<?php 
    return [
        //Site
        '/' => 'Home@index',
        '/menu' => 'Home@menu',
        '/about' => 'Home@about',
        '/contact' => 'Home@contact',
        '/login' => 'Home@login',
        '/generateOrder' => 'Home@generateOrder',
        '/finalizeOrder' => 'finalizeOrder@index',
        '/product/[0-9]+' => 'Product@index',

        //Painel de controle
        '/dashboard/[0-9]+/'=> 'Dashboard@index',
        '/dashboard/[0-9]+/category'=> 'Dashboard@category',
        '/dashboard/[0-9]+/products'=> 'Dashboard@products',
        '/dashboard/[0-9]+/paidOrders'=> 'Dashboard@paidOrders',
        '/dashboard/[0-9]+/pendingOrders'=> 'Dashboard@pendingOrders',
        '/dashboard/[0-9]+/completedOrders'=> 'Dashboard@completedOrders',
        '/dashboard/[0-9]+/clients'=> 'Dashboard@clients',
        '/dashboard/[0-9]+/users'=> 'Dashboard@users',
        '/dashboard/[0-9]+/selfConfig'=> 'Dashboard@selfConfig'
    ];
?>