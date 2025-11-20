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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion del cliente</title>
</head>
<body>
    <form method="post">
    <div> 
<label for="dni">Dni</label>
<input type="text" name="dni" id="dni">
</div>

    <div> 
<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="nombre">
</div>

    <div> 
<label for="direccion">direccion</label>
<input type="text" name="direccion"  id="direccion">
</div>

    <div> 
<label for="localidad">localidad</label>
<input type="text" name="localidad"  id="localidad">
</div>

    <div> 
<label for="provincia">provincia</label>
<input type="text" name="provincia"  id="provincia">
</div>

    <div> 
<label for="telefono">Telefono</label>
<input type="text" name="telefono"  id="telefono">
</div>

    <div> 
<label for="email">Email</label>
<input type="text" name="email"  id="email">
</div>

<input type="submit" value="crear">
 </form>
</body>
</html>
