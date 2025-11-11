<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
include "insertarvisita.php";
    $comentario = $_POST["comentario"];
    $usuario = $_POST["usuario"];
    if(insertar_visita($usuario,$comentario)){
        $mensaje =  "Insertado el comentario correctamente";
        header("Location: librovisitas.php?mensaje=$mensaje");
    } else{
     $mensaje =  "El comentario no se ha creado";
         header("Location: librovisitas.php?mensaje=$mensaje");
    }

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva visita</title>
</head>
<body>
<form action="" method="POST">
    <label for="usuario">Nombre:</label>
    <input type="text" name="usuario" id="usuario" required><br><br>

    <label for="comentario">Inserta un comentario:</label><br>
    <textarea name="comentario" id="comentario" rows="4" cols="50" required></textarea><br>

    <input type="submit" value="Crear">
</form>

    
</body>
</html>