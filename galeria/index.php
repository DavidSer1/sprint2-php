<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galería</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  
<h2 class="galeria">Subir imagen</h2>
<form action="" method="post" class="centre" enctype="multipart/form-data">
    <label>Nombre:</label>
    <input type="text" name="nombre" classs="baixarinputs" required><br><br>
    <label>Imagen:</label>
    <input type="file" name="fileToUpload" class="baixarinputs" required><br><br>
    <input type="submit" class="enviar" value="Enviar">
</form>

</body>
</html>

<?php
session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['csrf_token'];

$carpeta = "uploads/";

// Subir imagen
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_FILES['fileToUpload'])) {

    $nombre = $_POST["nombre"];
    $archivo = $_FILES["fileToUpload"];
    $ext_permitidas = ['jpg','jpeg','png','gif'];

    if ($archivo["error"] === 0) {
        $extension = strtolower(pathinfo($archivo["name"], PATHINFO_EXTENSION));

        if (in_array($extension, $ext_permitidas)) {
            $nuevoNombre = time() . "_" . basename($archivo["name"]);
            $rutaDestino = $carpeta . $nuevoNombre;

            if (move_uploaded_file($archivo["tmp_name"], $rutaDestino)) {

                file_put_contents($carpeta . "nombres.txt", $nuevoNombre . "|" . $nombre . PHP_EOL, FILE_APPEND);
            } else {
              echo "<div class=pare>";
                echo "<p> Error al guardar la imagen.</p> ";
                echo "</div>";
            }
        } else {
              echo "<div class=pare>";
            echo "<p>  Solo se permiten extensiones: " . implode(", ", $ext_permitidas) . " </p> ";
                     echo "</div>";
        }
    } else {
        echo "<div class=pare>";
        echo "No se ha subido ninguna imagen.";
        echo "</div>";

    }
}

// Leer lista de imágenes y nombres
$lista = [];
if (file_exists($carpeta . "nombres.txt")) {
    $lineas = file($carpeta . "nombres.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lineas as $linea) {
        list($archivoImg, $nombreImg) = explode("|", $linea);
        $lista[] = ["nombre"=>$nombreImg, "imagen"=>$carpeta.$archivoImg];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Galería</title>

</head>
<body>

<hr>

<h2 class="galeria">Galería</h2>
<div class="contenedor-tabla "> 
<table class="" >
    <tr>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Acción</th>
    </tr>
    <?php foreach($lista as $item): ?>
    <tr>
        <td><?= htmlspecialchars($item['nombre']); ?></td>
        <td><img src="<?= htmlspecialchars($item['imagen']); ?>" width="150"></td>
        <td>
            <form method="post">
                <input type="hidden" name="csrf_token" value="<?= $token; ?>">
                <input type="hidden" name="archivo" value="<?= basename($item['imagen']); ?>">
                <input type="hidden" name="borrar" value="1">
                <button type="submit">Borrar</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
</body>
</html>
