<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $comentario = $_POST["comentario"];

    if(insertar_visita($comentario)){
        $mensaje =  "Insertado el comentario correctamente";
        header("Location: libro-visitas.php?mensaje=$mensaje");
    } else{
     $mensaje =  "El comentario no se ha creado";
         header("Location: libro-visitas.php?mensaje=$mensaje");
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
    <form action="insertar-visita.php">
<label for="comentario"></label>
<input type="text" id="comentario" name="comentario">

    </form>
    
</body>
</html>