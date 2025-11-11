<?php

if(isset($_GET["mensaje"])){
    $mensaje = $_GET["mensaje"];
    echo $mensaje . "<br>";
}

leerarchivo();


function leerarchivo() {
    $archivo = 'visitas2.txt';

    if (!file_exists($archivo)) {
        echo "El archivo no existe.";
        return;
    }

    // Obtiene todas las líneas en un array
    $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Recorre cada línea con foreach
    foreach ($lineas as $linea) {
        echo $linea . "<br>";
    }
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

    <a href="nuevavisita2.php">Crear visitas</a>
    
</body>
</html>