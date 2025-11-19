<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
</head>
<body>
    
<h2 class="galeria">Subir imagen</h2>
<form action="" method="post" enctype="multipart/form-data">
    <label>Imagen:</label>
    <input type="file" name="fileToUpload" required><br><br>
    <input type="submit" value="Enviar">
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

// Subida de imagen
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['fileToUpload'])) {
    $archivo = $_FILES["fileToUpload"];
    $ext_permitidas = ['jpg','jpeg','png','gif','webp'];

    if ($archivo["error"] === 0) {
        $extension = strtolower(pathinfo($archivo["name"], PATHINFO_EXTENSION));

        if (in_array($extension, $ext_permitidas)) {
            $nuevoNombre = time() . "_" . basename($archivo["name"]);
            $rutaDestino = $carpeta . $nuevoNombre;

            if (move_uploaded_file($archivo["tmp_name"], $rutaDestino)) {
                echo "<div class=pare>";
                echo "<p>Imagen subida correctamente.</p>";
                echo "</div>";
            } else {
                     echo "<div class=pare>";
                echo "<p>Error al guardar la imagen.</p>";
                  echo "</div>";
            }
        } else {
               echo "<div class=pare>";
            echo "<p>Solo se permiten extensiones: " . implode(", ", $ext_permitidas) . "</p>";
              echo "</div>";
        }

    } else {
           echo "<div class=pare>";
        echo "<p>No se ha subido ninguna imagen.</p>";
          echo "</div>";
    }
}

// Listado de imágenes
$extensiones = ['jpg','jpeg','png','gif','webp'];
$lista = [];

$archivos = scandir($carpeta);
foreach ($archivos as $archivo) {
    if ($archivo == "." || $archivo == "..") continue;
    $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    if (in_array($extension, $extensiones)) {
        $lista[] = [
            "archivo" => $archivo,
            "nombre"  => $archivo
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Galería</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>



<hr>

<h2 class="galeria">Galería</h2>
<table>
    <tr>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Acción</th>
    </tr>

    <?php foreach($lista as $item): ?>
    <tr>
        <td><?= htmlspecialchars($item['nombre']); ?></td>
        <td><img src="uploads/<?= htmlspecialchars($item['archivo']); ?>" width="150"></td>
        <td>
            <form action="borrar.php" method="post">
                <input type="hidden" name="csrf_token" value="<?= $token; ?>">
                <input type="hidden" name="archivo" value="<?= htmlspecialchars($item['archivo']); ?>">
                <button type="submit">Borrar</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
