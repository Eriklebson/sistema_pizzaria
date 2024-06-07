<?php

function exactMatchUri($uri, $routes){
    return (array_key_exists($uri, $routes)) ? [$uri => $routes[$uri]] : [];
}
function regularMatchUri($uri, $routes){
    return array_filter($routes, function($value) use($uri){
        $regex = str_replace('/','\/', ltrim($value, '/'));
        return preg_match("/^$regex$/", ltrim($uri, '/'));
    }, ARRAY_FILTER_USE_KEY);
}

function params($uri, $matcheUri){
    if(!empty($matcheUri)){
        $matchedToGetParams = array_keys($matcheUri)[0];
        return array_diff(
            explode('/', ltrim($uri, '/')),
            explode('/', ltrim($matchedToGetParams, '/'))
        );
    }
    return [];
}

function paramsFormat($uri, $params){
    $uri = explode('/', ltrim($uri, '/'));
    $paramsData = [];
    foreach($params as $index => $param){
        $paramsData[$uri[$index - 1]] = $param;
    }
    return $paramsData;
}

function router(){
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $routes = require 'routes.php';
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    $matcheUri = exactMatchUri($uri, $routes[$requestMethod]);
    $params = [];
    if(str_contains($uri, 'dashboard')){
        auth();
    }
    if(empty($matcheUri)){
        $matcheUri = regularMatchUri($uri, $routes[$requestMethod]);
        $params = params($uri, $matcheUri);
        $params = paramsFormat($uri, $params); 
    }
    if(!empty($matcheUri)){
        return controller($matcheUri, $params);
    }

    throw new Exception('Pagina não encontrada');
}
?>