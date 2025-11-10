<?php

if(isset($_GET["mensaje"])){
    $mensaje = $_GET["mensaje"];
    echo $mensaje . "<br>";
}
leerarchivo();

function leerarchivo(){
    $archivo = fopen("visitas.txt", "r");
    $tamano = filesize("visitas.txt");
$texto = fread($archivo, $tamano);
echo $texto . "<br>";
fclose($archivo);
}


?>