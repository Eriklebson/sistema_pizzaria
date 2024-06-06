<?php 
return [
    'POST' => [
        '/login' => 'Login@login',
        '/register' => 'Clients@store',
    ],
    'GET' => [
        //Site
        '/' => 'Home@index',
        '/menu' => 'Home@menu',
        '/about' => 'Home@about',
        '/contact' => 'Home@contact',
        '/login' => 'Login@index',
        '/register' => 'Home@register',
        '/generateOrder' => 'Home@generateOrder',
        '/finalizeOrder' => 'FinalizeOrder@index',
        '/product/[0-9]+' => 'Product@index',

        //Painel de controle
        '/dashboard'=> 'Dashboard@index',
        '/dashboard/category'=> 'Dashboard@category',
        '/dashboard/products'=> 'Dashboard@products',
        '/dashboard/paidOrders'=> 'Dashboard@paidOrders',
        '/dashboard/pendingOrders'=> 'Dashboard@pendingOrders',
        '/dashboard/completedOrders'=> 'Dashboard@completedOrders',
        '/dashboard/clients'=> 'Clients@index',
        '/dashboard/users'=> 'Users@index',
        '/dashboard/editUser/[0-9]+'=> 'Users@edit',
        '/dashboard/selfConfig'=> 'Dashboard@selfConfig',
        '/logout' => 'Login@destroy',
    ]
];
?>