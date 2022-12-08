<?php 
setlocale(LC_MONETARY,"es_MX");
date_default_timezone_set('America/Mexico_City');
header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL);
ini_set('display_errors', '1');
define('IP','multitenant.eficasia.com'); # Produccion
//define('IP','172.16.73.37'); #Desarrollo
define('PORT','8082');
#define('RUTA','/media/nmedia/files/');
define('RUTA',$_SERVER["DOCUMENT_ROOT"].'/sitio-seguro/aasets/files/');


// LOGOUT

// https://multitenant.eficasia.com:8082/db/SSI/LogOut

/*SSI/Login



{"PARAMETERS": {
"Usuario": "Usuario1",
"Password": "d4a9f6ab150364271304b524fc4f1102",
"OS": "IOS",
"Browser": "Safari",
"IP": "172.16.73.32"
}}




SSI/LogOut
{"PARAMETERS": {
"idUsuario": 1
}}


SSI/PassUpdate
{"PARAMETERS": {
"idUsuario": "6",
"Password": "adfts5tg84gtrv632frs8jhy65hnb985"
}}




[{
    "Code": 1,
    "Usuario": [{
        "idUsuario": 1,
        "Nombre": "Francisco Barrón Zuñiga",
        "Usuario": "fbarron",
        "idPerfil": 1,
        "Perfil": "ROOT",
        "Token": "12345678SDFGHJRTYUIO"
    }],
    "Carpetas": [{
        "idcarpeta": 1,
        "Carpeta": "Files",
        "Subir": true,
        "Descargar": true,
        "Eliminar": true
    }],
    "Extensiones": [{
        "idExtArc": 1,
        "Extension": "doc"
    }, {
        "idExtArc": 2,
        "Extension": "docx"
    }, {
        "idExtArc": 3,
        "Extension": "pgp"
    }, {
        "idExtArc": 4,
        "Extension": "jpg"
    }, {
        "idExtArc": 5,
        "Extension": "jpeg"
    }, {
        "idExtArc": 6,
        "Extension": "gif"
    }, {
        "idExtArc": 7,
        "Extension": "txt"
    }, {
        "idExtArc": 8,
        "Extension": "pdf"
    }, {
        "idExtArc": 9,
        "Extension": "xls"
    }, {
        "idExtArc": 10,
        "Extension": "xlsx"
    }, {
        "idExtArc": 11,
        "Extension": "mp3"
    }, {
        "idExtArc": 12,
        "Extension": "wav"
    }, {
        "idExtArc": 13,
        "Extension": "zip"
    }]
}]




*/



?>