<?php 
include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];
$id=(isset($_POST['idUser']))?intval($_POST['idUser']):1;
$idUsuario=$id;

$data['PARAMETERS'] = [
    "idUsuario"=>$idUsuario
];

$response =  $consumo->API('SSI/LogOut',$data);
echo $response;
session_destroy();
/*
SSI/LogOut
{"PARAMETERS": {
"idUsuario": 1
}}
*/