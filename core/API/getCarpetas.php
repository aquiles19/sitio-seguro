<?php 
include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];

$dataSession = json_decode($_SESSION["login"]);
$id = $dataSession->response[0]->Usuario[0]->idUsuario;
$idPerfil= strval($_POST['idPerfil']); 

$data['PARAMETERS'] = [
    "idPerfil"=>$idPerfil
];
#var_dump($data,$id);die();
$response =  $consumo->API('SSI/GetCarpetas',$data);
echo $response;
