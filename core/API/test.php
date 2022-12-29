<?php 

#echo json_encode($_POST,JSON_UNESCAPED_UNICODE);die();

$RESPONSE = [];
$data['PARAMETERS'] = [
    "Nombre"=>$_POST["Nombre"],
    "Paterno"=>$_POST["Paterno"],
    "Materno"=>$_POST["Materno"],
    "Email"=>$_POST["Email"],
    "idPerfil"=>$_POST["idPerfil"]
];

// $response  -> idUsuario
$idUsuario = 0;
$GestExt['PARAMETERS'] = [
    "idUsuario"=>$idUsuario,
    "ExtArchivos"=>$_POST["Extensiones"]
];



$GestPerm['PARAMETERS'] = [
    "idUsuario"=>$idUsuario,
    "Carpetas"=>$_POST["Carpetas"]
];

$RESPONSE["USUARIO"]=$data;
$RESPONSE["GestExtArchivos"]=$GestExt;
$RESPONSE["GestPermisosCarpetas"]=$GestPerm;

$response= json_encode($RESPONSE, JSON_UNESCAPED_UNICODE);
echo $response;
#echo json_encode($_POST,JSON_UNESCAPED_UNICODE);