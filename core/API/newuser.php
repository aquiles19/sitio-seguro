<?php 
include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];

echo json_encode($_POST,JSON_UNESCAPED_UNICODE);


#print_r($_POST);
die();
$dataSession = json_decode($_SESSION["login"]);
$idUsuario= strval($_POST['clUsrApp']); //$dataSession->response[0]->idUsuario;

$data['PARAMETERS'] = [
    "idUsuario"=>$idUsuario,
    "Password"=>strval($_POST['pass'])
];

$response =  $consumo->API('SSI/PassUpdate',$data);
echo $response;
