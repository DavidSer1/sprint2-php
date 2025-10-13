<?php 
session_start();
if(!isset($_SESSION["usuari"])){
     header("Location: login.html");
     exit;
}

?>