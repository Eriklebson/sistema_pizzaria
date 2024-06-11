<?php 
return [
    'POST' => [
        //Site
        '/login' => 'Login@login',
        '/register' => 'Clients@store',

        //painel de controle
        '/dashboard/update' => 'Users@update',
        '/dashboard/addCategory' => 'Category@store',
        '/dashboard/editCategory' => 'Category@update',
        '/dashboard/addProduct' => 'Product@store',
        '/dashboard/editProduct'=> 'Product@update',
        '/dashboard/deleteImg/[0-9]+'=> 'Image@delete',
        '/dashboard/addImage' => 'Image@upload',
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
        '/dashboard/category'=> 'Category@index',
        '/dashboard/editCategory/[0-9]+'=> 'Category@edit',
        '/dashboard/products'=> 'Product@Index',
        '/dashboard/addProduct'=> 'Product@addProduct',
        '/dashboard/editProduct/[0-9]+'=> 'Product@editProduct',
        '/dashboard/editProductImg/[0-9]+'=> 'Image@editProductImg',
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