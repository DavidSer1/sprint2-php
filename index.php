<?php 
include "Cliente.class.php";
include "redireccionlogin.php";
$cliente = Cliente::obtenertodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar clientes </title>
</head>
<body>
        <?php if ($_SESSION["permisos"] == "administrador") : ?>
    <a href="clientenuevo.php">Crear cliente</a>
        <?php endif; ?>
<table>
<tr>
<th>Dni</th>
<th>Nombre</th>
<th>Dirección</th>
<th>Localidad</th>
<th>Provincia</th>
<th>Telefono</th>
<th>Email</th>
     <?php if ($_SESSION["permisos"] == "administrador") : ?>
<th>Accions</th>
      <?php endif; ?>
</tr>
<tr>
    <?php  foreach($cliente as $clientes): ?>
     <td> <?php echo $clientes->getDNI()  ?></td>
     <td> <?php echo $clientes->getnombre()  ?></td>
     <td><?php echo $clientes->getdireccion()  ?></td>
     <td><?php echo $clientes->getlocalidad()  ?></td>
     <td><?php echo $clientes->getprovincia()  ?></td>
     <td><?php echo $clientes->gettelefono()  ?></td>
    <td><?php echo $clientes->getemail()  ?></td>
 
  <td>
    <?php if ($_SESSION["permisos"] === "administrador") : ?>
        <a href="editarcliente.php?dni=<?= $clientes->getDNI() ?>">Editar</a>
    <?php endif; ?>
</td>

<td>
    <?php if ($_SESSION["permisos"] == "administrador") : ?>
      <a href="borrarcliente.php?dni=<?= $clientes->getDNI() ?>"
   onclick="return confirm('¿Seguro que quieres eliminar este cliente?');">
   ELIMINAR
</a>
    <?php endif; ?>
</td>


</tr>

<?php endforeach; ?>


</table>
<?php 

if(isset($_GET["mensaje"])){
    $mensaje = $_GET["mensaje"];
    echo $mensaje;
}

?>
     <a href="cerrar.php">Cerrar</a>
</body>
</html>