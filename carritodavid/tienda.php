<?php 
session_start();


include "redireccionlogin.php";
include "funciones.php";

 echo escaparate();

echo "<a href=vercarrito.php>Ver carrito</a>";
echo "<a href=destruir.php>Cerrar sesion</a>";


?>