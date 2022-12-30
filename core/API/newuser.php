<?php 
include_once '../Consumos.php';
session_start();


$consumo    =   new Servicio();
$ip = $_SERVER['REMOTE_ADDR'];


$RESPONSE = [];
$data['PARAMETERS'] = [
    "Nombre"=>$_POST["Nombre"],
    "Paterno"=>$_POST["Paterno"],
    "Materno"=>$_POST["Materno"],
    "Email"=>$_POST["Email"],
    "Usuario"=> $_POST["Usuario"],
    "idPerfil"=>$_POST["idPerfil"]
];

// $response  -> idUsuario
$response =  $consumo->API('SSI/GestUsuario',$data);
$RESULT= json_decode($response, true);
if($RESULT["response"][0]['Code']==1){
    $idUsuario = $RESULT["response"][0]['idUsuario'];
    $GestExt['PARAMETERS'] = [
        "idUsuario"=>$idUsuario,
        "ExtArchivos"=>implode(",", $_POST["Extensiones"])
    ];
    $responseExtensiones =  $consumo->API('SSI/GestExtArchivos',$GestExt);
    $RESULT["response"][0]['Extensiones']=$responseExtensiones;

    $GestPerm['PARAMETERS'] = [
        "idUsuario"=>$idUsuario,
        "Carpetas"=>$_POST["Carpetas"]
    ];
    $responseCarpetas =  $consumo->API('SSI/GestPermisosCarpetas',$GestPerm);
    $RESULT["response"][0]['Carpetas']=$responseCarpetas;
    //GestExtArchivos
}

$response= json_encode($RESULT, JSON_UNESCAPED_UNICODE);
echo $response;



die();



//////******************************** */ 
//////
////// SSI/GestPermisosCarpetas
//////
//////******************************** */
$Carpetas = [];
foreach ($_POST['permisos'] as $key => $value) {
    $Carpetas[$key]["idCarpeta"]=$_POST['etiquetas'][$key];
    if(strpos($value, "1") === false){
        $Carpetas[$key]["Descargar"]=0;
    }else{
        $Carpetas[$key]["Descargar"]=1;
    }
    if(strpos($value, "2") === false){
        $Carpetas[$key]["Subir"]=0;
    }else{
        $Carpetas[$key]["Subir"]=1;
    }
    if(strpos($value, "3") === false){
        $Carpetas[$key]["Eliminar"]=0;
    }else{
        $Carpetas[$key]["Eliminar"]=1;
    }
    
    
}
// echo json_encode($Carpetas,JSON_UNESCAPED_UNICODE);

$Nombre     =   $_POST["Nombre"];#:"Carlos",
$Paterno    =   $_POST["Paterno"];#:"Estrada",
$Materno    =   $_POST["Materno"];#:"Narcizo",
$Email      =   $_POST["Email"];#:"jose.estrada@gmail.com",
$Password   =   $_POST["Password"];#:"dejc1319",
$Usuario    =   $_POST["Usuario"];#:"cestrada",
$idPerfil   =   $_POST["idPerfil"];#:"1"

$data["PARAMETERS"] = [
    "Nombre"=>$Nombre,
    "Paterno"=>$Paterno,
    "Materno"=>$Materno,
    "Email"=>$Email,
    "Usuario"=>$Usuario,
    "idPerfil"=>$idPerfil
];
$response =  $consumo->API('SSI/GestUsuario',$data);
echo $response;
echo json_encode($data,JSON_UNESCAPED_UNICODE);
/*
SSI/GestUsuario
{
    "PARAMETERS": {
        "Nombre": "Nombre",
        "Paterno": "Paterno",
        "Materno": "Materno",
        "Email": "email@email.com",
        "Usuario": "usuario3",
        "idPerfil": "1"
    }
}
{"result":"OK","response":[{"Code":1,"Msj":"Alta correcta"}]}
*/



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
