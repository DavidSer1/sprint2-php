<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
include "insertarvisita.php";
    $comentario = $_POST["comentario"];

    if(insertar_visita($comentario)){
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
<label for="comentario">Inserta un comentario</label>

     <textarea name="comentario" id="comentario" rows="4" cols="50"></textarea><br>
<input type="submit" value="Crear">
    </form>
    
</body>
</html>