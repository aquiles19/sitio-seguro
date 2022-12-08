<?php 
include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];

$data['PARAMETERS'] = [
    "Usuario"=> strval($_POST["usuario"]),
    "Password"=>strval($_POST['pass']),
    "OS"=> $consumo->_getOS(),//"IOS",
    "Browser"=> $consumo->_getBrowser(), //"Safari",
    "IP"=> $ip//"172.16.73.32"

];

$response =  $consumo->API('SSI/Login',$data);
$_SESSION['login']=$response;
$_SESSION['user']=strval($_POST["usuario"]);
echo $response;
