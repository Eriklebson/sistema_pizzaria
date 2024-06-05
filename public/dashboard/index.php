<?php 
session_start();
require '../../vendor/autoload.php';

try{
    $data = router();
    extract($data['data']);
    if(!isset($data['view'])){
        throw new Exception("Pagina não encontrada");
    }
    if(!file_exists(VIEWS.$data['view'])){
        throw new Exception("Arquivo não encontrado {$data['view']}");
    }
    $view = $data['view'];
    require VIEWS.'dashboard/layouts/main.php';
}
catch(Exception $e){
    var_dump($e->getMessage());
}
?>