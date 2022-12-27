<?php 
include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];

$idUsuario=$_POST["idUsuario"] ;
$Accion=$_POST["Accion"];


if($Accion == 5){
    $data["PARAMETERS"] = [
        "idUsuario"=>$idUsuario
    ];
    $response =  $consumo->API('SSI/LogOut',$data);
}else{
    $data["PARAMETERS"] = [
        "idUsuario"=>$idUsuario,
        "Accion"=>$Accion
    ];
    $response =  $consumo->API('SSI/GestUsuario',$data);
}


echo $response;