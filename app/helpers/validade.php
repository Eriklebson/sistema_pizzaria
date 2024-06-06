<?php
function validade(array $validations){
    $param = '';
    $result = [];
    foreach($validations as $field => $validade){
        if(!str_contains($validade, '|')){
            if(str_contains($validade, ':')){
                [$validade, $param] = explode(':', $validade);
            }
            $result[$field] = $validade($field, $param);
        }
        else{
            $result[$field] = multipleValidation($validade, $field, $param);

        }
    }

    if(in_array(false, $result)){
        return false;
    }
    return $result;
}
function multipleValidation($validade, $field, $param){
    $explodePipeValidate = explode('|', $validade);
    foreach($explodePipeValidate as $validade){
        if(str_contains($validade, ':')){
            [$validade, $param] = explode(':', $validade);
        }
        $result = $validade($field, $param);
    }
    return $result;
}

function required($field){
    if($_POST[$field] === ''){
        setFlash($field, 'O campo é obrigatório');
        return false;
    }
    return filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
}
function email($field){
    $emailIsValide = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);
    if(!$emailIsValide){
        setFlash($field, 'O campo tem que ser um email válido');
        return false;
    }
    return filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
}
function unique($field, $param){
    $data = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
    $user = findBy($param, "where {$field}='{$data}'");
    if($user){
        setFlash($field, "O {$field} já esta cadastrado");
        return false;
    }
    return $data;
}
function maxlen($field, $param){
    $data = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
    if(strlen($data) > $param){
        setFlash($field, "Esse campo não pode passar de {$param} caracteres");
        return false;
    }
    return $data;
}
function minlen($field, $param){
    $data = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
    if(strlen($data) < $param){
        setFlash($field, "Esse campo não pode ter menos de {$param} caracteres");
        return false;
    }
    return $data;
}
function confPass($field){
    $data = filter_input(INPUT_POST, $field, FILTER_UNSAFE_RAW);
    $pass = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
    if($data != $pass){
        setFlash($field, "A confirmação de senha tem que ser igual a senha");
        return false;
    }
    return $pass;
}
?>