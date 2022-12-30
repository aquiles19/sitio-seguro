<?php

include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];


$data['PARAMETERS'] = [
    "idUsuario"=>$_POST["idUsuario"],
    "Nombre"=>$_POST["Nombre"],
    "Paterno"=>$_POST["Paterno"],
    "Materno"=>$_POST["Materno"],
    "Email"=>$_POST["Email"],
    "idPerfil"=>$_POST["idPerfil"]
];
$response =  $consumo->API('SSI/GestUsuario',$data);

$GestExt['PARAMETERS'] = [
    "idUsuario"=>$_POST["idUsuario"],
    "ExtArchivos"=>implode(",", $_POST["Extensiones"])
];
$responseExtensiones =  $consumo->API('SSI/GestExtArchivos',$GestExt);


$GestPerm['PARAMETERS'] = [
    "idUsuario"=>$_POST["idUsuario"],
    "Carpetas"=>$_POST["Carpetas"]
];
$responseCarpetas =  $consumo->API('SSI/GestPermisosCarpetas',$GestPerm);

$RESPONSE = json_decode($response, true);
$RESPONSE["response"][0]['Extensiones']=json_decode($responseExtensiones,true);
$RESPONSE["response"][0]['Carpetas']=json_decode($responseCarpetas,true);

$response= json_encode($RESPONSE, JSON_UNESCAPED_UNICODE);
echo $response;
