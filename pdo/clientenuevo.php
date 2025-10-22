<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cliente nuevo</title>

</head>
<body>

<h2>Nuevo cliente</h2>

<?php
$errores = [];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once 'funciones.php';

    $dni = trim($_POST['dni'] ?? '');
    $nombre = trim($_POST['nombre'] ?? '');
    $direccion = trim($_POST['direccion'] ?? '');
    $localidad = trim($_POST['localidad'] ?? '');
    $provincia = trim($_POST['provincia'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $email = trim($_POST['email'] ?? '');

    $resultado = validar($dni, $nombre, $direccion, $localidad, $provincia, $telefono, $email);

    if ($resultado !== true) {
        $errores = is_array($resultado) ? $resultado : [$resultado];
    } else {
        try {
            $conexion = obtenerconexion();


            $check = $conexion->prepare("SELECT COUNT(*) FROM Cliente WHERE dni = :dni");
            $check->execute([':dni' => $dni]);
            if ($check->fetchColumn() > 0) {
                $errores[] = "Ya existe un cliente con ese DNI";
            } else {
               
                $stmt = $conexion->prepare(
                    "INSERT INTO Cliente (dni,nombre,direccion,localidad,provincia,telefono,email)
                     VALUES (:dni,:nombre,:direccion,:localidad,:provincia,:telefono,:email)"
                );

                $ok = $stmt->execute([
                    ':dni' => $dni,
                    ':nombre' => $nombre,
                    ':direccion' => $direccion,
                    ':localidad' => $localidad,
                    ':provincia' => $provincia,
                    ':telefono' => $telefono,
                    ':email' => $email
                ]);

                if ($ok) {
               $message = "CLIENTE CREADO CORRECTAMENTE";
                echo "<script>alert('$message');   
                window.location.href = 'index.php';

</script>"; 
                } else {
                    $errores[] = "Error al crear el cliente en la base de datos";
                }
            }

        } catch (PDOException $e) {
            $errores[] = "Error de base de datos: " . $e->getMessage();
        }
    }
}

// Mostrar errores
if (!empty($errores)) {
    echo '<div class="mensaje error"><ul>';
    foreach ($errores as $error) {
        echo '<li>' . htmlspecialchars($error) . '</li>';
    }
    echo '</ul></div>';
}



?>

<form action="clientenuevo.php" method="post" novalidate>
  <label for="dni">DNI:</label>
  <input type="text" id="dni" name="dni" value="<?php echo htmlspecialchars($dni ?? ''); ?>" placeholder="12345678A">

  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre ?? ''); ?>" placeholder="Introduce tu nombre">

  <label for="direccion">Dirección:</label>
  <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($direccion ?? ''); ?>" placeholder="Calle, número, piso...">

  <label for="localidad">Localidad:</label>
  <input type="text" id="localidad" name="localidad" value="<?php echo htmlspecialchars($localidad ?? ''); ?>" placeholder="Ciudad o pueblo">

  <label for="provincia">Provincia:</label>
  <input type="text" id="provincia" name="provincia" value="<?php echo htmlspecialchars($provincia ?? ''); ?>" placeholder="Provincia">

  <label for="telefono">Teléfono:</label>
  <input type="tel" id="telefono" name="telefono" value="<?php echo htmlspecialchars($telefono ?? ''); ?>" placeholder="600123456">

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" placeholder="usuario@correo.com">

  <br><br>
  <input type="submit" value="Enviar" name="enviar">
</form>

</body>
</html>
