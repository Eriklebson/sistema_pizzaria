<?php
namespace app\controllers;

class Users{
    public function index($params){
        permissions(user(), [1]);
        $users =  findAll('users where type_account != 3;');
        return[
            'view' => 'dashboard/users.php',
            'data' => ['title' => 'Usuarios', 'users' => $users]
        ];
    }
    public function edit($params){
        permissions(user(), [1]);
        if(!isset($params['editUser'])){
            return redirect("/dashboard/".$params['dashboard']."/");
        }
        $user = findBy('users', 'where id='.$params['editUser']);
        return[
            'view' => 'dashboard/editUser.php',
            'data' => ['title' => 'Edit Usuarios', 'user' => $user]
        ];
    }
    public function store(){
        //Editar quando fazer o cadastro de usuario
        permissions(user(), [1]);
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
    public function update(){
        permissions(user(), [1]);
        $id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);
        $name = filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_UNSAFE_RAW);
        $type_account = filter_input(INPUT_POST, 'type_account', FILTER_UNSAFE_RAW);
        $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
        $user = findBy('users', 'where id='.filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW));
        $validate['name'] = $name;
        if($user->email != $email){
            $data = validade([
                'email' => 'email|unique:users',
            ]);
            array_splice_assoc($validate, -1, 1, array('email' => $data['email']));
        }
        if($user->phone != $phone){
            $validate .= validade([
                'phone' => 'unique:users',
            ]);
            array_splice_assoc($validate, -1, 1, array('phone' => $data['phone']));
        }
        array_splice_assoc($validate, -1, 1, array('type_account' => $type_account));
        if($password != ''){
            array_splice_assoc($validate, -1, 1, array('password' => $password));
        }
        if(!$validate){
            return redirect('/dashboard/editUser/'.filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW));
        }
        array_splice_assoc($validate, -1, 1, array('updated_at' => date('Y-m-d H:m:s')));
        array_splice_assoc($validate, -1, 1, array('updated_by' => user()->id));
        $update = update("users", $validate, $id);
        if(!$update){
            return setMessageAndRedirect('error', 'Ocorreu um erro na atualização, tente novamente em alguns segundos', '/dashboard/editUser/'.filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW));
        }
        $user = findBy("users", "where id=".user()->id);
        return setMessageAndRedirect('success', 'Usuario Atualizado com sucesso', '/dashboard/editUser/'.filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW));
    }
}
?>