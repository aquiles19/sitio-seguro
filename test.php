<?php 

session_start();

print_r($_SESSION);

$texto = "Hola!+Mi'Nombre €Es&Ju%an tes";
$texto = preg_replace('([^A-Za-z0-9])', '', $texto);
echo $texto;