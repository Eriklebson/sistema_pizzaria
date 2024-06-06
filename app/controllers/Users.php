<?php
namespace app\controllers;

class Users{
    public function index($params){
        $users =  findAll('users where type_account != 3;');
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
    public function storeCliente(){
        $validate = validade([
            'name' => 'required',
            'phone' => 'required|minlen:16|unique:users',
            'email' => 'email|unique:users',
            'password' => 'required|minlen:7',
            'password_conf' => 'required|minlen:7|confPass'
        ]);
        if(!$validate){
            return redirect('/register');
        }

        $validate['password'] = password_hash($validate['password'], PASSWORD_DEFAULT);
        array_splice_assoc($validate, 'password_conf', 1, array('type_account' => 3));
        $created = create('users', $validate);

        if(!$created){
            setFlash('message', 'Ocorreu um erro ao cadastrar, tente novamente em alguns segundos');
            return redirect('/register');
        }
        $login = new Login();
        $login->login($validate);
        return redirect('/dashboard');
    }
}
?>