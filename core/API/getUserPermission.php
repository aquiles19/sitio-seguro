<?php

include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];

#$dataSession = json_decode($_SESSION["login"]);
$idUsuario= isset($_POST['idUser'])?strval($_POST['idUser']):1; //$dataSession->response[0]->idUsuario;

$data['PARAMETERS'] = [
    "idUsuario"=> 6 #$idUsuario
    #"Password"=>strval($_POST['pass'])
];

$response =  $consumo->API('SSI/GetPermisosUsuario',$data);
echo $response;

?>