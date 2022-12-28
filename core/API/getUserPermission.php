<?php

include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];

#$dataSession = json_decode($_SESSION["login"]);
$idUsuario= isset($_POST['iduser'])?strval($_POST['iduser']):49; //$dataSession->response[0]->idUsuario;

$data['PARAMETERS'] = [
    "idUsuario"=>$idUsuario
    #"Password"=>strval($_POST['pass'])
];
#print_r($data);
$response =  $consumo->API('SSI/GetPermisosUsuario',$data);
echo $response;

?>