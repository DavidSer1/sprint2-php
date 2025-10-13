<?php 

   setcookie("carrito", unserialize($carrito), time() - 3600);
   echo "Gracias por tu compra ";
   echo "<br>";
    echo "<a href=tienda.php>Para volver a la tienda</a>";
?>