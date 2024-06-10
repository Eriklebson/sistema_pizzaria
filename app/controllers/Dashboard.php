<?php
namespace app\controllers;

class Dashboard{
    public function index(){
        return[
            'view' => 'dashboard/home.php',
            'data' => ['title' => 'Dashboard']
        ];
    }
    public function paidOrders(){
        permissions(user(), [1, 2]);
        return[
            'view' => 'dashboard/paidOrders.php',
            'data' => ['title' => 'Pedidos Pagos']
        ];
    }
    public function pendingOrders(){
        permissions(user(), [1, 2, 3]);
        return[
            'view' => 'dashboard/pendingOrders.php',
            'data' => ['title' => 'Pedidos Pendentes']
        ];
    }
    public function completedOrders(){
        permissions(user(), [1, 2, 3]);
        return[
            'view' => 'dashboard/completedOrders.php',
            'data' => ['title' => 'Pedidos Concluidos']
        ];
    }
    public function selfConfig(){
        permissions(user(), [1, 2, 3]);
        return[
            'view' => 'dashboard/selfConfig.php',
            'data' => ['title' => 'Configuração de Conta']
        ];
    }
}
?>