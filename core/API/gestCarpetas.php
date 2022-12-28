<?php 
include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];

if(isset($_POST['idCarpeta'])){
    $idCarpeta  =   intval($_POST['idCarpeta']);
    $Estatus    =   intval($_POST['Estatus']);

    $data['PARAMETERS'] = [
        "idCarpeta"=>$idCarpeta,
        "Estatus"=>$Estatus
    ];
    #var_dump($data,$idCarpeta);die();
    $response =  $consumo->API('SSI/GestCarpetas',$data);

}else{
    if(isset($_POST['Nombre'])){
        $Nombre  =   strval($_POST['Nombre']);
        $Nombre = str_replace(" ","_",$Nombre);
        $Nombre = str_replace(" ","_",$Nombre);
        $Nombre = str_replace(" ","_",$Nombre);
        $Nombre = str_replace(" ","_",$Nombre);
        $Nombre = str_replace(" ","_",$Nombre);
        $Nombre = str_replace(" ","_",$Nombre);
        $Nombre = str_replace(" ","_",$Nombre);
        $Nombre = str_ireplace(" ","_",$Nombre);
        


        $data['PARAMETERS'] = [
            "Nombre"=>$Nombre
        ];
        #var_dump($data,$Nombre);die();
        $response =  $consumo->API('SSI/GestCarpetas',$data);
        $RESP = json_decode($response);
        if($RESP->response[0]->Code == 1){
            $target_dir =  RUTA . $Nombre;
            mkdir($target_dir);
        }
       
        // SSI_GestCarpetas '{"PARAMETERS":{"Nombre":"Files"}}'

    }else{
        $response["response"][0] = array("code" => 0, "msg" => "No se recibio ningun nombre");
        $response= json_encode($response, JSON_UNESCAPED_UNICODE);
        #die();
    }
   
    //SSI/GestCarpetas   '{"PARAMETERS":{"idCarpeta": 1,"Estatus": "1"}}'

}


echo $response;
