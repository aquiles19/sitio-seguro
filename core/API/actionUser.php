<?php 
include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];

/*
SSI/GestUsuario
{
    "PARAMETERS": {
        "idUsuario": 1,
        "Accion": 1
    }
}
*/
$idUsuario=$_POST["idUsuario"];
$Accion=$_POST["Accion"];

$data["PARAMETERS"] = [
    "idUsuario"=>$idUsuario,
    "Accion"=>$Accion
];
//echo json_encode($data,JSON_UNESCAPED_UNICODE);die();

$response =  $consumo->API('SSI/GestUsuario',$data);
echo $response;