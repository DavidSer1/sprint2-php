<?php 
$carrito = isset($_COOKIE["carrito"]) ? unserialize($_COOKIE["carrito"]) : [];


if(isset($_GET["referencia"])){
      $referencia = $_GET["referencia"];

if(isset($carrito[$referencia])){
 $carrito[$referencia] +=1 ;
}

else{
     $carrito[$referencia] = 1;
}

   setcookie("carrito", serialize($carrito), time() + 3600);
 
}
echo "<pre>";
print_r($carrito);
echo "</pre>";

  header("Location:  tienda.php");

exit;
?>