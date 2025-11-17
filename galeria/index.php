<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar todos los nombres e imágenes</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h2 class="galeria">Galeria</h2>

<form action="" class="centre" method="post" enctype="multipart/form-data">

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" class="baixarinputs" id="nombre" required><br><br>

    <label for="fileToUpload">Imagen:</label>
    <input type="file" name="fileToUpload"  class="baixarinputs" id="fileToUpload" ><br>

    <input type="submit" class="enviar" value="Enviar">
</form>

<?php
$archivoJSON = "datos.json";
$datos = [];

// Leer datos
if (file_exists($archivoJSON)) {
    $json = file_get_contents($archivoJSON);
    $datos = json_decode($json, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $archivo = $_FILES["fileToUpload"];

    $ext_permitidas = ['jpg', 'jpeg', 'png'];

    if ($archivo["error"] == 0) {

        $extension = strtolower(pathinfo($archivo["name"], PATHINFO_EXTENSION));

        if (in_array($extension, $ext_permitidas)) {

            // Moure image a uploads
            $nuevoNombre = time() . "_" . basename($archivo["name"]);
            $rutaDestino = "uploads/" . $nuevoNombre;

            if (move_uploaded_file($archivo["tmp_name"], $rutaDestino)) {

                $datos[] = [
                    "nombre" => $nombre,
                    "imagen" => $rutaDestino
                ];

                // Actualizar json 
                file_put_contents($archivoJSON, json_encode($datos, JSON_PRETTY_PRINT));

            } else {
                echo "<p> Error al guardar la imagen.</p>";
            }

        } else {
            echo " <p> Solo se permiten extensiones  </p>   " . implode(", ", $ext_permitidas);
        }

    } else {
      echo "<div class=pare>";
        echo " <p> No se ha subido ninguna imagen. </p>";
        echo "</div>";
    }
}


?>


<hr>

<h2 class="galeria">Listado de todos los nombres e imágenes</h2>
<div class="contenedor-tabla">
<table>
    <tr>
        <th>Nombre</th>
        <th>Imagen</th>
        <th> Accions  </th>
    </tr>

    <?php foreach ($datos as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['nombre']); ?></td>
            <td>
                <img src="<?= htmlspecialchars($item['imagen']); ?>" >
            </td>
            <td>
            <?php echo "<a href=borrar.php?>Borrar</a>"  ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</div>


</body>
</html>
