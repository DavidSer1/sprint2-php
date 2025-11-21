<?php
if(isset($_GET["dni"])){
    $dnis = $_GET["dni"];
}
include "Conexion.class.php";
$conexion = Conexion::obtenerconexion();
$consulta = $conexion->prepare("select * from clientes where dni = :dni");
$consulta->execute([':dni' => $dnis]);
$cliente = $consulta->fetch(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificación del cliente</title>
</head>
<body>
    <form method="post">
    <div> 
<label for="dni">Dni</label>
<input type="text" name="dni" id="dni" value="<?php echo $cliente['dni']; ?>">
</div>

    <div> 
<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="nombre" value=" <?php echo  $cliente["nombre"] ?>">
</div>

    <div> 
<label for="direccion">direccion</label>
<input type="text" name="direccion" id="direccion" value="<?php echo $cliente['direccion']; ?>">
</div>

    <div> 
<label for="localidad">localidad</label>
<input type="text" name="localidad" id="localidad" value="<?php echo $cliente['localidad']; ?>">
</div>

    <div> 
<label for="provincia">provincia</label>
<input type="text" name="provincia" id="provincia" value="<?php echo $cliente['provincia']; ?>">
</div>

    <div> 
<label for="telefono">Telefono</label>
<input type="text" name="telefono" id="telefono" value="<?php echo $cliente['telefono']; ?>">
</div>

    <div> 
<label for="email">Email</label>
<input type="text" name="email" id="email" value="<?php echo $cliente['email']; ?>">
</div>

<input type="submit" value="Modificar">
 </form>
</body>
</html>

<?php 


include "funciones.php";
if($_SERVER["REQUEST_METHOD"] == "POST" ){
     $dni = $_POST["dni"];
     $nombre = $_POST["nombre"];
     $direccion = $_POST["direccion"];
     $localidad = $_POST["localidad"];
     $provincia = $_POST["provincia"];
     $telefono = $_POST["telefono"];
     $email = $_POST["email"];
     if(editarcliente($dni,$nombre,$direccion,$localidad,$provincia,$telefono,$email)){
         $mensaje = "Cliente Modificado correctamente";
        header("Location: index.php?mensaje=$mensaje");
     }
     else{
       $mensaje = "El cliente no se ha modificado";
        header("Location: index.php?mensaje=$mensaje");
     }
}


?>


