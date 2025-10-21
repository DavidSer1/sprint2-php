<?php
include "clienteclass.php";
$cliente = new Cliente();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
  
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Listado de Clientes</h2>

 
    <?php
    if (isset($_GET['eliminacion'])) {
        echo "<div class='message success'>Se ha eliminado el cliente con el DNI " . htmlspecialchars($_GET['eliminacion']) . "</div>";
    }

    if (isset($_GET['creacion'])) {
        echo "<div class='message success'>Se ha creado el cliente con el DNI " . htmlspecialchars($_GET['creacion']) . "</div>";
    }

    if (isset($_GET['creacionerronea'])) {
        echo "<div class='message error'>Error al crear el cliente con el DNI " . htmlspecialchars($_GET['creacionerronea']) . "</div>";
    }

    if (isset($_GET['eliminacionerronea'])) {
        echo "<div class='message error'>Error al eliminar el cliente con el DNI " . htmlspecialchars($_GET['eliminacionerronea']) . "</div>";
    }

    if (isset($_GET['modificacion'])) {
        echo "<div class='message success'>Se ha modificado el cliente con el DNI " . htmlspecialchars($_GET['modificacion']) . "</div>";
    }
    ?>
 
    <div>
        <a class="button " href="clientenuevo.html">Crear cliente</a>
    </div>

    <div class="table-container">
        <?php $cliente->muestra(); ?>
    </div>
</body>
</html>
