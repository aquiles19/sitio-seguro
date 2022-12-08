<?php
include_once './core/Consumos.php';
session_start();

if (isset($_POST['archivo'])) {
    //Read the filename
    
    $carpeta = strval($_POST['carpeta']);
    $filename =  RUTA . $carpeta ."/". $_POST['archivo'];
    #$filename =  RUTA . $_POST['archivo'];

    //Check the file exists or not
    if (file_exists($filename)) {

        $consumo    =   new Servicio();
        $ip = $_SERVER['REMOTE_ADDR'];

        $dataSession = json_decode($_SESSION["login"]);
        $id = $dataSession->response[0]->Usuario[0]->idUsuario;
        $idCarpeta= strval($_POST['idCarpeta']); //$dataSession->response[0]->Usuario[0]->idUsuario;

        $data['PARAMETERS'] = [
                "idUsuario"=>$id,
                "idAccion"=>2,
                "idCarpeta"=>$idCarpeta,
                "Archivo"=>$_POST['archivo'],
                "IP"=>$ip
                
        ];
        //var_dump($data,$id);die();
        $response =  $consumo->API('SSI/AccionesArchivos',$data);

        //Define header information
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: 0");
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        header('Content-Length: ' . filesize($filename));
        header('Pragma: public');

        //Clear system output buffer
        flush();

        //Read the size of the file
        readfile($filename);

        //Terminate from the script
        die();
    } else {
        echo "File does not exist.";
    }
} else
    echo "Filename is not defined.";
