<?php 

$email = "bb ";
echo "Dirección recibida: '$email'.<br>";
$emailbueno = "eeeeeeeeeeeee";
// Eliminamos los espacios en blanco
$email = trim($email);
// Reemplazamos pernambuco.es por pernambuco.com
$email = str_replace($email, $emailbueno , $email);
echo "Dirección corregida: '$email'.";

echo "<br>";
$capitales = array(
    "Italia" => "Roma",
    "Francia" => "París",
    "Portugal" => "Lisboa"
);

foreach ($capitales as $pais => $capital) {
    echo "La capital de $pais es $capital<br>";
}



?>