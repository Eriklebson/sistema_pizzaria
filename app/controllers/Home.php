<?php
namespace app\controllers;

class Home{
    public function index(){
        return[
            'view' => 'home.php',
            'data' => ['title' => 'Home']
        ];
    }
    public function menu(){
        return[
            'view' => 'menu.php',
            'data' => ['title' => 'Cardápio']
        ];
    }
    public function about(){
        return[
            'view' => 'about.php',
            'data' => ['title' => 'Sobre']
        ];
    }
    public function contact(){
        return[
            'view' => 'contact.php',
            'data' => ['title' => 'Contato']
        ];
    }
    public function generateOrder(){
        return[
            'view' => 'generateOrder.php',
            'data' => ['title' => 'Comanda']
        ];
    }
    public function register(){
        return[
            'view' => 'register.php',
            'data' => ['title' => 'Registrar']
        ];
    }
}
?>