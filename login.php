<?php 

       
session_start();


if($_SERVER['REQUEST_METHOD'] === "POST"){

     $usuario = $_POST["user"];
     $password = $_POST["password"];
     $usuariolog = "David";
     $contraseña = 1234;


     if($usuario == $usuariolog &&  $password == $contraseña ){
        $_SESSION["usuari"] == $usuario;
         header("Location: tienda.php");

     }
     else{
        echo "Usuario y contraseña incorrectos";
     }


}



?>