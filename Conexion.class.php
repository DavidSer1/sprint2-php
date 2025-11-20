<?php 
class Conexion{ 
public static function obtenerconexion(){
try{ 
    $conexion = new PDO('mysql:host=localhost;dbname=clientesdavid', 'david', 'Destructor.,7');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conexion;
}
catch(PDOException $e){
return null;
}

}
}
?>