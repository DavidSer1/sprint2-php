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
                echo "Error al guardar la imagen.";
            }

        } else {
            echo "Solo se permiten extensiones    " . implode(", ", $ext_permitidas);
        }

    } else {
        echo " No se ha subido ninguna imagen.";
    }
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar todos los nombres e imágenes</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h2>Galeria</h2>

<form action="" method="post" enctype="multipart/form-data">

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required><br><br>

    <label for="fileToUpload">Imagen:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" ><br><br>

    <input type="submit" value="Enviar">
</form>

<hr>

<h2>Listado de todos los nombres e imágenes</h2>
<div class="contenedor-tabla">
<table>
    <tr>
        <th>Nombre</th>
        <th>Imagen</th>
    </tr>

    <?php foreach ($datos as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['nombre']); ?></td>
            <td>
                <img src="<?= htmlspecialchars($item['imagen']); ?>" >
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</div>


</body>
</html>
