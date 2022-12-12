<?php 
/*
define('IP','172.29.3.40'); #Desarrollo s
#define('PORT','8091');
define('PORTS','8083');
*/

include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];

#$dataSession = json_decode($_SESSION["login"]);
$idUsuario= isset($_POST['idUser'])?strval($_POST['idUser']):0; //$dataSession->response[0]->idUsuario;

$data['PARAMETERS'] = [
    "idUsuario"=>$idUsuario
    #"Password"=>strval($_POST['pass'])
];

$response =  $consumo->API('SSI/GetUsuarios',$data);
echo $response;

?>

<?php

/*
#include_once "config.php";
$data['PARAMETERS'] = array();
// $data['PARAMETERS'] = array("idUsuario"=>$idUsuario,'Token'=>$_SESSION["Token"]);
$data_string = json_encode($data,JSON_UNESCAPED_UNICODE);
#echo $data_string;die();
$ch = curl_init('http://'.IP.':'.PORTS.'/db/SRV/GetUsuarios');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Content-Length: ' . strlen($data_string))
);
$result = curl_exec($ch);
echo $result;
*/

