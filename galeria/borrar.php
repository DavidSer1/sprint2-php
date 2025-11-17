<?php 

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" ){

    if(!isset($_POST['csrf_token']) || $_POST['csrf_token']  !== $_SESSION['csrf_token']  ){ 
    $mensaje =  "El token CSRF invalid ";
header("Location: index.php?mensaje=$mensaje");
exit;

    }
    $nombre = $_POST['borrar_nombre'];

    $mensaje = "El item con el nombre $nombre borrado correctamente";
   header("Location: index.php?mensaje=$mensaje");

}





?>