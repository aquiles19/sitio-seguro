<?php 
include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];

if(isset($_POST['idCarpeta'])){


}else{
    if(isset($_POST['Nombre']))
    $idPerfil= strval($_POST['idPerfil']);

    $data['PARAMETERS'] = [
        "idPerfil"=>$idPerfil
    ];
    var_dump($data,$id);die();

    $response =  $consumo->API('SSI/GetCarpetas',$data);
    echo $response;


}

