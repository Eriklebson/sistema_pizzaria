<?php 
function controller($matcheUri, $params){
    [$controller, $method] = explode('@', array_values($matcheUri)[0]);
    $controllerWithNameSpace = CONTROLLER_PATH.$controller;
    if(!class_exists($controllerWithNameSpace)){
        throw new Exception("Controller {$controller} não existe");
    }

    $controllerInstace = new $controllerWithNameSpace;
    if(!method_exists($controllerInstace, $method)){
        throw new Exception("Method {$method} não existe no controller {$controller}");
    }

    $controller = $controllerInstace->$method($params);
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        die();
    }

    return $controller;
}

function array_splice_assoc(&$input, $offset, $length, $replacement) {
    $replacement = (array) $replacement;
    $key_indices = array_flip(array_keys($input));
    if (isset($input[$offset]) && is_string($offset)) {
        $offset = $key_indices[$offset];
    }
    if (isset($input[$length]) && is_string($length)) {
        $length = $key_indices[$length] - $offset;
    }

    $input = array_slice($input, 0, $offset, TRUE)
        + $replacement
        + array_slice($input, $offset + $length, NULL, TRUE);
}
?>