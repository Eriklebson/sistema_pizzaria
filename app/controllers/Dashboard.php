<?php
namespace app\controllers;

class Dashboard{
    public function index($params){
        return[
            'view' => 'dashboard/home.php',
            'data' => ['title' => 'Dashboard']
        ];
    }
    public function category($params){
        permissions(user(), [1]);
        return[
            'view' => 'dashboard/category.php',
            'data' => ['title' => 'Categoria']
        ];
    }
    public function products($params){
        permissions(user(), [1, 2]);
        return[
            'view' => 'dashboard/products.php',
            'data' => ['title' => 'Produtos']
        ];
    }
    public function paidOrders($params){
        permissions(user(), [1, 2]);
        return[
            'view' => 'dashboard/paidOrders.php',
            'data' => ['title' => 'Pedidos Pagos']
        ];
    }
    public function pendingOrders($params){
        permissions(user(), [1, 2, 3]);
        return[
            'view' => 'dashboard/pendingOrders.php',
            'data' => ['title' => 'Pedidos Pendentes']
        ];
    }
    public function completedOrders($params){
        permissions(user(), [1, 2, 3]);
        return[
            'view' => 'dashboard/completedOrders.php',
            'data' => ['title' => 'Pedidos Concluidos']
        ];
    }
    public function selfConfig($params){
        permissions(user(), [1, 2, 3]);
        return[
            'view' => 'dashboard/selfConfig.php',
            'data' => ['title' => 'Configuração de Conta']
        ];
    }
}
?>