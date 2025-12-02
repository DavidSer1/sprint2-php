<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
</head>
<body>
    <form action="" method="post">

<div>
<label for="Nom">Nombre</label>
<input type="text" name="nom" id="nom">
</div>
<div>
<label for="contra">Contraseña</label>
<input type="password" name="contra" id="contra">

</div>

<div>
<button type="submit" name="Enviar">Login</button>
</div>
    </form>


</body>
</html>

<?php 
include "funciones.php";

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $nombre = $_POST["nom"];
    $contra = $_POST["contra"];
$permisos = obtenerPermisos($nombre);
    if(login($nombre,$contra)){
$mensaje = "Te has logueado correctamente ";
$_SESSION["nombre"] = $nombre;
$_SESSION["permisos"] = $permisos;
        header("Location: index.php?mensaje=$mensaje");
    }
    else{
        $mensaje = "No se ha podido loguear";
                header("Location: index.php?mensaje=$mensaje");
    }
}
?>