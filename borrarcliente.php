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