<?php
namespace app\controllers;

class Home{
    public function index($params){
        return[
            'view' => 'home.php',
            'data' => ['title' => 'Home']
        ];
    }
    public function menu($params){
        return[
            'view' => 'menu.php',
            'data' => ['title' => 'Cardápio']
        ];
    }
    public function about($params){
        return[
            'view' => 'about.php',
            'data' => ['title' => 'Sobre']
        ];
    }
    public function contact($params){
        return[
            'view' => 'contact.php',
            'data' => ['title' => 'Contato']
        ];
    }
    public function login($params){
        return[
            'view' => 'login.php',
            'data' => ['title' => 'login']
        ];
    }
    public function generateOrder($params){
        return[
            'view' => 'generateOrder.php',
            'data' => ['title' => 'Comanda']
        ];
    }
}
?>