<?php
ini_set('memory_limit', '4024M'); // or you could use 1G
$array = [];
$myfile = fopen("usuarios.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file

while ($line = fgets($myfile)) {
    // <... Do your work with the line ...>
    // echo($line);
    array_push($array,$linea);
  }
fclose($myfile);


$array = array_unique($array);

$mkdir="";
foreach ($array as $key => $value) {

    $mkdir .= str_ireplace(["(",")"],"",$value);
}

echo "mkdir ".$mkdir;
echo "<br>";
/*
echo json_encode($array);
print_r($array);
*/

?>