<?php

include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];

#$dataSession = json_decode($_SESSION["login"]);
$idUsuario= isset($_POST['idUser'])?strval($_POST['idUser']):1; //$dataSession->response[0]->idUsuario;

$data['PARAMETERS'] = [
    "idUsuario"=> 6,
    "Carpetas"=> [[
        "idCarpeta"=> 21,
        "Subir"=> 1,
        "Descargar"=> 1,
        "Eliminar"=> 1
    ], [
        "idCarpeta"=> 23,
        "Subir"=> 1,
        "Descargar"=> 1,
        "Eliminar"=> 1
    ], [
        "idCarpeta"=> 26,
        "Subir"=> 1,
        "Descargar"=> 1,
        "Eliminar"=> 1
    ], [
        "idCarpeta"=> 30,
        "Subir"=> 1,
        "Descargar"=> 1,
        "Eliminar"=> 1
    ], [
        "idCarpeta"=> 41,
        "Subir"=> 1,
        "Descargar"=> 1,
        "Eliminar"=> 1
    ], [
        "idCarpeta"=> 48,
        "Subir"=> 1,
        "Descargar"=> 1,
        "Eliminar"=> 1
    ], [
        "idCarpeta"=> 51,
        "Subir"=> 1,
        "Descargar"=> 1,
        "Eliminar"=> 1
    ]] #$idUsuario
    #"Password"=>strval($_POST['pass'])
];

#print_r(json_encode($data));die();

$response =  $consumo->API('SSI/GestPermisosCarpetas',$data);
echo $response;


/* 
SSI/GestPermisosCarpetas
{"PARAMETERS": {
"idUsuario": 1,
"Carpetas": [{
"idCarpeta": 1,
"Subir": 1,
"Descargar": 1,
"Eliminar": 1
}, {
"idCarpeta": 12,
"Subir": 1,
"Descargar": 1,
"Eliminar": 1
}, {
"idCarpeta": 24,
"Subir": 0,
"Descargar": 0,
"Eliminar": 1
}]
}}

Response
[{"Code":1}]




"Carpetas": [{
			"idCarpeta": 24,
			"Subir": true,
			"Descargar": true,
			"Eliminar": true
		}, {
			"idCarpeta": 30,
			"Subir": true,
			"Descargar": true,
			"Eliminar": true
		}, {
			"idCarpeta": 14,
			"Subir": true,
			"Descargar": true,
			"Eliminar": true
		}, {
			"idCarpeta": 40,
			"Subir": true,
			"Descargar": true,
			"Eliminar": true
		}, {
			"idCarpeta": 17,
			"Subir": true,
			"Descargar": true,
			"Eliminar": true
		}, {
			"idCarpeta": 16,
			"Subir": true,
			"Descargar": true,
			"Eliminar": true
		}, {
			"idCarpeta": 15,
			"Subir": true,
			"Descargar": true,
			"Eliminar": true
		}]



*/

?>