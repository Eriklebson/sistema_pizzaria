<?php
namespace app\controllers;

class Login{
    public function index(){
        return[
            'view' => 'login.php',
            'data' => ['title' => 'Login']
        ];
    }
    public function login(){
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
        $date = md5(date('d/m/Y H:i:s').$password);
        $data = ['login_key' => password_hash($date, PASSWORD_DEFAULT)];
        $update = update("users", $data, $user->id);
        setcookie("login_key", $date, 0, '/');
        $_SESSION['logged'] = $user;
        if(!$update){
            return setMessageAndRedirect('verify', 'Ocorreu um erro na verificação por favor entre em contato com o suporte', '/login');
        }
        return redirect('/dashboard');
    }
    public function destroy(){
        unset($_SESSION['logged']);
        return redirect('/');
    }
}
?>