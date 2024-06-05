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
?>