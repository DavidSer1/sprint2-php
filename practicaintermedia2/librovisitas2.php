<?php

if(isset($_GET["mensaje"])){
    $mensaje = $_GET["mensaje"];
    echo $mensaje . "<br>";
}

leerarchivo();


function leerarchivo() {
    $archivo = "visitas.txt";

    if (!file_exists($archivo)) {
        echo "No hay comentarios aún.";
        return;
    }

    $abrir = fopen($archivo, "r");

    if ($abrir === false) {
        echo "No se pudo abrir el archivo.";
        return;
    }

    $texto = fread($abrir, filesize($archivo));
    fclose($abrir);

    $texto = nl2br($texto . "\n");

    echo $texto;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro visitas</title>
</head>
<body>

    <a href="nuevavisita.php">Crear visitas</a>
    
</body>
</html>