 <?php 
 session_start();
 if ($_SESSION["permisos"] == "administrador") { ?>
<?php 

if(isset($_GET["dni"])){
    $dni = $_GET["dni"];

include "funciones.php";
    if(eliminarcliente($dni)){
           $mensaje = "Cliente eliminado correctamente";
        header("Location: index.php?mensaje=$mensaje");
    }
    else{
    $mensaje = "El cliente no se ha podido eliminar";
        header("Location: index.php?mensaje=$mensaje");
    }
}


?>
     <?php }
        else{
            $mensaje = "Solo se puede eliminar con permisos de administrador";
header("Location: index.php?mensaje=$mensaje");

        }
        
        
        
        ?>