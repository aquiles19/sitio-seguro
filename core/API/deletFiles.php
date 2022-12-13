<?php
include_once '../Consumos.php';
session_start();

$carpeta = strval($_POST['carpeta']);
$filename =  RUTA . $carpeta ."/". $_POST['archivo'];

if (file_exists($filename)) {
    if (unlink($filename)) {


        $consumo    =   new Servicio();
        $ip = $_SERVER['REMOTE_ADDR'];

        $dataSession = json_decode($_SESSION["login"]);
        $id = $dataSession->response[0]->Usuario[0]->idUsuario;
        $idCarpeta = strval($_POST['idCarpeta']);
        

        $data['PARAMETERS'] = [
            "idUsuario" => $id,
            "idAccion" => 3,
            "idCarpeta" => $idCarpeta,
            "Archivo" => $_POST['archivo'],
            "IP" => $ip

        ];
        //var_dump($data,$id);die();
        $response =  $consumo->API('SSI/AccionesArchivos', $data);
        echo $response;
    } else {
        $response = [
            "error" => "0",
            "response" => []
        ];
        $response["response"][0] = array("code" => 1, "msg" => "No existe el archivo","file1"=>$filename);
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
} else {
    $response = [
        "error" => "0",
        "response" => []
    ];
    $response["response"][0] = array("code" => 1, "msg" => "No existe el archivo","file2"=>$filename);
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}
