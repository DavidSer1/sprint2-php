<?php
session_start();

$carpeta = "uploads/";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_POST["csrf_token"]) || $_POST["csrf_token"] !== $_SESSION["csrf_token"]) {
     header("Location: index.php");
    }

    if (isset($_POST["archivo"])) {
        $archivo = basename($_POST["archivo"]);
        $ruta = $carpeta . $archivo;

        if (file_exists($ruta)) {
            unlink($ruta);
        }
    }
}

header("Location: index.php");
exit;
?>
