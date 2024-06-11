<?php
define('ROOT', dirname(__FILE__, 3));
include ROOT."/app/database/connect.php";

$imagens = $_POST['imagens'];
$pos = 1;
foreach($imagens as $image){
    connect()->query("update photos set order_ = '$pos' where id = $image;");
    $pos ++;
}
?>