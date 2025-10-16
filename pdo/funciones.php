<?php 

function obtenerconexion(){
try{ 
    $conexion = new PDO('mysql:host=localhost;dbname=Clientes', 'javi' , 'Destruct0r!2025');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conexion;
}

catch(PDOException $e){

    echo "Error conectandose en la base de datos" . $e->getMessage();
    return null;
}
}



?>