<?php 

function user(){
    if(isset($_SESSION['logged'])){
        return $_SESSION['logged'];
    }
}
function logged(){
    return isset($_SESSION['logged']);
}
?>