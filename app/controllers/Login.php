<?php
namespace app\controllers;

class Login{
    public function index($params){
        return[
            'view' => 'login.php',
            'data' => ['title' => 'Login']
        ];
    }
    public function login($params){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
        if(empty($email) || empty($password)){
            return setMessageAndRedirect('verify', 'Contém campo vazio', '/login');
        }
        $user = findBy("users", "where email='".$email."'");
        if(!$user){
            return setMessageAndRedirect('verify', 'Usuário ou senha estão incorretos', '/login');
        }
        if(!password_verify($password, $user->password)){
            return setMessageAndRedirect('verify', 'Usuário ou senha estão incorretos', '/login');
        }
        $_SESSION['logged'] = $user;
        return redirect('/dashboard');
    }
    public function destroy(){
        unset($_SESSION['logged']);
        return redirect('/');
    }
}
?>