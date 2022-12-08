<?php
include_once '../Consumos.php';
session_start();
#var_dump($_FILES,$_POST);die();
$idCarpeta = strval($_POST['idCarpeta']);
$carpeta = strval($_POST['carpeta']);
$dataSession = json_decode($_SESSION["login"]);
$id = $dataSession->response[0]->Usuario[0]->idUsuario;
$nameUser = $dataSession->response[0]->Usuario[0]->Usuario;
$Extensiones = $dataSession->response[0]->Extensiones;
$valid_extensions = array();

foreach ($Extensiones as $key => $value) {
    array_push($valid_extensions, $value->Extension);
}

#var_dump($valid_extensions);die();
if ($_FILES['fileToUpload']['error'] == 0 && isset($_FILES['fileToUpload']['name'])) {


    $target_dir =  RUTA . $carpeta ."/" . $_FILES["fileToUpload"]["name"];
    //$data = json_decode($_SESSION["login"]);


    $filename  = $_FILES["fileToUpload"]["name"];

    $file_basename = substr($filename, 0, strripos($filename, '.'));
    $file_ext = substr($filename, strripos($filename, '.'));



    /* Location */
    $location =  RUTA . $carpeta ."/";
    $locationF =  RUTA . $carpeta ."/" . $filename;
    $imageFileType = pathinfo($locationF, PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    /* Valid extensions 
$valid_extensions = array("jpg","jpeg","png","pdf");
*/

    $response = 0;
    /* Check file extension */
    if (in_array(strtolower($imageFileType), $valid_extensions)) {
        // Rename file
        $rename = str_replace(" ", "_", $file_basename);
        $fecha =  date("Y-m-dTH:i:s");
        $date = new DateTime($fecha);


        $newfilename = $rename . "_" . $date->format('YmdHis') . $file_ext;
        if (file_exists($location . $newfilename)) {
            // file already exists error
            $response = [
                "error" => "0",
                "response" => []
            ];
            $response["response"][0] = array("code" => 0, "msg" => "El archivo ya existe");
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $location . $newfilename);
            /*
            SERVICIO DE CARGA DE ARCHIVO
            
            $idCarpeta

            AQUI Y RESPUESTA DE CARGA EXITOSA

             */
            $consumo    =   new Servicio();
            $ip = $_SERVER['REMOTE_ADDR'];
            $dataSession = json_decode($_SESSION["login"]);

            $data['PARAMETERS'] = [
                "idUsuario" => $id,
                "idAccion" => 1,
                "idCarpeta" => $idCarpeta,
                "Archivo" => $newfilename,
                "FechaArc"=>$date->format('Y-m-d H:i:s'),
                "IP" => $ip

            ];
            $fechaResponse = str_replace(" ","T",$date->format('Y-m-d H:i:s'));
            $response =  $consumo->API('SSI/AccionesArchivos', $data);
            $RESULT= json_decode($response, true);
            $RESULT["response"][0]['name']=$newfilename;
            $RESULT['response'][0]['fecha']=$fechaResponse;
            $RESULT['response'][0]['idCarpeta']=$idCarpeta;
            $RESULT['response'][0]['idUsuario'] = $id;
            $RESULT['response'][0]['nameUser'] =$nameUser;

            #var_dump($RESULT);
            #echo $response;
            echo json_encode($RESULT, JSON_UNESCAPED_UNICODE);
            //echo "File uploaded successfully."
        }
        /* Upload file 
   if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$location)){
      $response = $location;
   }
   */
    } else {
        $response = [
            "error" => "0",
            "response" => []
        ];
        $response["response"][0] = array("code" => 0, "msg" => "La extension no es valida, favor de verificar el archivo");
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }


    exit;







} else {
    $response = [
        "error" => "0",
        "response" => []
    ];
    $response["response"][0] = array("code" => 0, "msg" => "Error por falta de archivo");
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}
