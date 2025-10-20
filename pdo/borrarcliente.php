<?php 
if(isset($_GET["dni"])){
$dni = $_GET["dni"];
include "funciones.php";
try{ 
$conexion = obtenerconexion();

$stmt = $conexion->prepare('delete from Cliente where dni = :dni');
$rows = $stmt->execute([':dni' => $dni]);

if($rows > 0){
    header("Location: index.php");
}
}
catch(PDOException $e){
    echo "Error:"  . $e->getMessage();
}
}



?>