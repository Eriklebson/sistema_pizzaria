<?php

function routes(){
    return require 'routes.php';
} 

function exactMatchUri($uri, $routes){
    if(array_key_exists($uri, $routes)){
        return [$uri => $routes[$uri]];
    }
    return [];
}
function regularMatchUri($uri, $routes){
    return array_filter($routes, function($value) use($uri){
        $regex = str_replace('/','\/', ltrim($value, '/'));
        return preg_match("/^$regex$/", ltrim($uri, '/'));
    }, ARRAY_FILTER_USE_KEY);
}

function params($uri, $matcheUri){
    if(!empty($matcheUri)){
        return array_keys($matcheUri)[0];
        $params = array_diff($uri, explode('/', ltrim($matcheUri, '/')));
    }
    return [];
}

function paramsFormat($uri, $params){
    $paramsData = [];
    foreach($params as $index => $params){
        $paramsData[$uri[$index - 1]] = $params;
    }
    return $paramsData;
}

function router(){
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $routes = routes();

    $matcheUri = exactMatchUri($uri, $routes);
    $params = [];
    if(empty($matcheUri)){
        $matcheUri = regularMatchUri($uri, $routes);
        $uri = explode('/', ltrim($uri, '/'));
        $params = params($uri, $matcheUri);
        if(is_array($params)){
            $params = paramsFormat($uri, $params);
        }
    }
    if(!empty($matcheUri)){
        return controller($matcheUri, $params);
    }

    throw new Exception('Algo deu errado');
}
?>