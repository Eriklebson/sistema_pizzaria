<?php 
function auth(){
    $user = findBy("users", "where id=".user()->id);
    if(!isset($_COOKIE['login_key'])){
        header("Location: /login");
    }
    if(!password_verify($_COOKIE['login_key'], $user->login_key)){
        header("Location: /login");
    }
}
function permissions($user, $level){
    if(!in_array($user->type_account, $level)){
        header("Location: /dashboard");
    }
}
?>