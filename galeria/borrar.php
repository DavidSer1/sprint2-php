<?php 

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" ){

    if(!isset($_POST['csrf_token']) || $_POST['csrf_token']  !== $_SESSION['csrf_token']  ){ 
    $mensaje =  "El token CSRF invalid ";
header("Location: index.php?mensaje=$mensaje");
exit;

    }
    $imagen = $_POST['archivo'];

    $mensaje = "El item con el nombre $imagen borrado correctamente";
   header("Location: index.php?mensaje=$mensaje");

}





?>