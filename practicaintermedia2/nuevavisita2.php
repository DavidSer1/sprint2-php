<?php
include "insertarvisita2.php";


$errores = [];
$usuario = "";
$comentario = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $comentario = $_POST["comentario"];
    $usuario = $_POST["usuario"];

    if($comentario == ""){
    $errores[] = "El campo comentario es obligatorio";
    }
    if($usuario == ""){
     $errores[] = "El campo usuario es obligatorio";

    }
   if (empty($errores)) {
        if (insertar_visita($usuario, $comentario)) {
            $mensaje = "Insertado el comentario correctamente";
            header("Location: librovisitas2.php?mensaje=" . urlencode($mensaje));
            exit;
        } else {
            $mensaje = "El comentario no se ha creado";
            header("Location: librovisitas2.php?mensaje=" . urlencode($mensaje));
            exit;
        }
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
    <?php 

if (!empty($errores)) {
    foreach ($errores as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
}
?>

<form action="" method="POST">
    <label for="usuario">Nombre:</label>
    <input type="text" name="usuario" id="usuario"    value="<?= htmlspecialchars($usuario) ?>" ><br><br>

    <label for="comentario">Inserta un comentario:</label><br>
 <textarea name="comentario" id="comentario" rows="4" cols="50"><?= htmlspecialchars($comentario) ?></textarea><br>

    <input type="submit" value="Crear">
</form>

    
</body>
</html>