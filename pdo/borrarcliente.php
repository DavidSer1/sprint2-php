<?php 
if(isset($_GET["dni"])){
$dni = $_GET["dni"];
include "funciones.php";
try{ 
$conexion = obtenerconexion();

$stmt = $conexion->prepare('delete from Cliente where dni = :dni');
$rows = $stmt->execute([':dni' => $dni]);

if($rows > 0){
       $message = "Cliente Borrado correctamente";
echo "<script>alert('$message');   
   window.location.href = 'index.php?eliminacion=$dni';

</script>";
}
else{
$message = "Error al borrar el cliente";
echo "<script>alert('$message');   
   window.location.href = 'index.php?eliminacionerronea=$dni';

</script>"; 
}
}
catch(PDOException $e){
    echo "Error:"  . $e->getMessage();
}
}



?>