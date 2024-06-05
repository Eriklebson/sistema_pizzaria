<?php
namespace app\controllers;

class Users{
    public function index($params){
        $users =  findAll('users');
        return[
            'view' => 'dashboard/users.php',
            'data' => ['title' => 'Usuarios', 'users' => $users]
        ];
    }
    public function edit($params){
        if(!isset($params['editUser'])){
            return redirect("/dashboard/".$params['dashboard']."/");
        }
        $user = findBy('users', 'where id='.$params['editUser']);
        return[
            'view' => 'dashboard/editUser.php',
            'data' => ['title' => 'Usuarios', 'user' => $user]
        ];
    }
}
?>