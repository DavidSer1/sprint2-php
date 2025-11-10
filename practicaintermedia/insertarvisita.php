<?php

function insertar_visita($comentario) {
    $archivo = 'visitas.txt';
    $abrir = fopen($archivo, 'a'); 

    if ($abrir === false) {
        return false;
    }

    fwrite($abrir, $comentario . "\n");
    fclose($abrir);

    return true;
}


?>