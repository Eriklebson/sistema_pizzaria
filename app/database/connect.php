<?php 
function connect(){
    return new PDO("mysql:host=localhost;dbname=sistema_pizzaria", "root", null, [PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ]);
}
?>