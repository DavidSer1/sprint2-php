<?php 
$carrito =[];
if(isset($_GET["referencia"])){

    $referencia = $_GET["referencia"];

  $pasarcookie =  $carrito[$referencia] = 1;

  setcookie("carrito",$pasarcookie,time()+3600);
  header("Location:  tienda.php");
} else{

     $pasarcookie =  $carrito[$referencia] +=1 ;
}




?>