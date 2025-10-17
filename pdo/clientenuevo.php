<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "funciones.php";
$dni = $_GET["dni"];
$nombre = $_GET["nombre"];
$direccion = $_GET["direccion"];
$localidad = $_GET["localidad"];
$provincia = $_GET["provincia"];
$telefono = $_GET["telefono"];
$email = $_GET["email"];

$conexion = obtenerconexion();
$stmt = $conexion->prepare(
 'insert into Cliente (dni,nombre,direccion,localidad,provincia,telefono,email)
  values (:dni, :nombre, :direccion, :localidad, :provincia, :telefono , :email)'   
);

$rows = $stmt->execute([
    ':dni' => $dni,
    ':nombre' => $nombre,
    ':direccion' => $direccion,
    ':localidad' => $localidad,
    ':provincia' => $provincia,
    ':telefono' => $telefono,
    ':email' => $email
]);

if($rows == 1)
echo "a";





}
?>