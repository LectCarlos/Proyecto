<?php
define("URL_ASSETS", "http://".$_SERVER['HTTP_HOST']."/Proyecto/CITDJulioFlorez/Public/");
define("BASE_URL", "http://".$_SERVER['HTTP_HOST']."/Proyecto/CITDJulioFlorez/");

$URL = explode('/', $_SERVER['REQUEST_URI']);

if (isset($URL[4]) && isset($URL[5])) {
    $Controller = ucwords($URL[4]);
    $Listar = explode('?', $URL[5])[0];
} else {
    $Controller = 'EstandarCtrll';
    $Listar = 'Inicio';
}

require_once('Controllers/' . $Controller . '.php');

$ObjController = new $Controller();
$ObjController->$Listar();
?>