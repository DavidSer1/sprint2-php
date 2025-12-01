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
    <a href="clientenuevo.php">Crear cliente</a>
<table>
<tr>
<th>Dni</th>
<th>Nombre</th>
<th>Dirección</th>
<th>Localidad</th>
<th>Provincia</th>
<th>Telefono</th>
<th>Email</th>
<th>Accions</th>

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
  <?php echo '<a href="editarcliente.php?dni=' . $clientes->getDNI() . '">Editar</a>'; ?>
</td>
      <td>
  <?php echo '<a href="borrarcliente.php?dni=' . $clientes->getDNI() . '">ELIMINAR</a>'; ?>
</td>

</tr>

<?php endforeach; ?>


</table>

     <a href="cerrar.php">Cerrar</a>
</body>
</html>