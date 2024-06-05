<?php
namespace app\controllers;

class FinalizeOrder{
    public function index($params){
        return[
            'view' => 'finalizeOrder.php',
            'data' => ['title' => 'Finalizar']
        ];
    }
}
?>