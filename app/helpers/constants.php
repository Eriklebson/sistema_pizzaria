<?php
date_default_timezone_set('America/Sao_Paulo');
define('CONTROLLER_PATH', 'app\\controllers\\');
define('ROOT', dirname(__FILE__, 3));
define('ASSETS', 'http://'.$_SERVER['HTTP_HOST']);
define('VIEWS', ROOT.'/app/views/');
?>