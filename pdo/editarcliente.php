<?php
include "funciones.php";
$conexion = obtenerconexion();
$cliente = null;

if (isset($_GET['dni'])) {
    $dni = $_GET['dni'];
    $stmt = $conexion->prepare("SELECT * FROM Cliente WHERE dni = :dni");
    $stmt->execute([':dni' => $dni]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $conexion->prepare(
        "UPDATE Cliente 
         SET nombre = :nombre,
             direccion = :direccion,
             localidad = :localidad,
             provincia = :provincia,
             telefono = :telefono,
             email = :email
         WHERE dni = :dni"
    );

    $stmt->execute([
        ':nombre' => $_POST['nombre'],
        ':direccion' => $_POST['direccion'],
        ':localidad' => $_POST['localidad'],
        ':provincia' => $_POST['provincia'],
        ':telefono' => $_POST['telefono'],
        ':email' => $_POST['email'],
        ':dni' => $_POST['dni']
    ]);

   header("Location: index.php");


  
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar Cliente</title>
</head>
<body>

<h2>Modificar Cliente</h2>

<form action="" method="post">
  <label for="dni">DNI:</label>
  <input type="text" name="dni" value="<?php echo htmlspecialchars($cliente['dni'] ); ?>" readonly><br><br>

  <label for="nombre">Nombre:</label>
  <input type="text" name="nombre" value="<?php echo htmlspecialchars($cliente['nombre'] ); ?>"><br><br>

  <label for="direccion">Dirección:</label>
  <input type="text" name="direccion" value="<?php echo htmlspecialchars($cliente['direccion']); ?>"><br><br>

  <label for="localidad">Localidad:</label>
  <input type="text" name="localidad" value="<?php echo htmlspecialchars($cliente['localidad'] ); ?>"><br><br>

  <label for="provincia">Provincia:</label>
  <input type="text" name="provincia" value="<?php echo htmlspecialchars($cliente['provincia'] ); ?>"><br><br>

  <label for="telefono">Teléfono:</label>
  <input type="tel" name="telefono" value="<?php echo htmlspecialchars($cliente['telefono'] ); ?>"><br><br>

  <label for="email">Email:</label>
  <input type="email" name="email" value="<?php echo htmlspecialchars($cliente['email'] ); ?>"><br><br>

  <input type="submit" value="Actualizar">
</form>

</body>
</html>
