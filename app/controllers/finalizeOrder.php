<?php
namespace app\controllers;

class FinalizeOrder{
    public function index(){
        return[
            'view' => 'finalizeOrder.php',
            'data' => ['title' => 'Finalizar']
        ];
    }
}
?>