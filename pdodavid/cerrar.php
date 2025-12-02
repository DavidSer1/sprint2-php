<?php
session_start();
$_SESSION = []; // vacía todas las variables de sesión
session_destroy(); // destruye la sesión
header("Location: index.php"); // redirige
exit();
