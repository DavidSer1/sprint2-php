<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "funciones.php";
$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$localidad = $_POST["localidad"];
$provincia = $_POST["provincia"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];



$conexion = obtenerconexion();

$stmt = $conexion->prepare(
 'insert into Cliente (dni,nombre,direccion,localidad,provincia,telefono,email)
  values (:dni, :nombre, :direccion, :localidad, :provincia, :telefono, :email)'   
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

if($rows == 1){  
$message = "Cliente creado correctamente.";
echo "<script>alert('$message');   
   window.location.href = 'index.php?creacion=$dni';

</script>";


}
else{
       $message = "Error al crear el cliente.";
echo "<script>alert('$message');   
   window.location.href = 'index.php?creacionerronea=$dni';

</script>";
}






}

?>