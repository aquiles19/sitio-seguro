<?php 
include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];

$dataSession = json_decode($_SESSION["login"]);
$id = $dataSession->response[0]->Usuario[0]->idUsuario;
$idCarpeta= strval($_POST['file']); //$dataSession->response[0]->Usuario[0]->idUsuario;

$data['PARAMETERS'] = [
    "idUsuario"=>$id,
    "idCarpeta"=>$idCarpeta
];
#var_dump($data,$id);die();
$response =  $consumo->API('SSI/GetArchivos',$data);
echo $response;
