<?php
namespace app\controllers;

class finalizeOrder{
    public function index($params){
        return[
            'view' => 'finalizeOrder.php',
            'data' => ['title' => 'Finalizar']
        ];
    }
}
?>