<?php
function insertar_visita($usuario, $comentario) {
    $archivo = 'visitas2.txt';
    $abrir = fopen($archivo, 'a');

    if ($abrir === false) {
        return false;
    }

    $visita = [
        "fecha" => date("Y-m-d H:i:s"),
        "usuario" => $usuario,
        "comentario" => $comentario
    ];

  $linea = " [{$visita['fecha']}] - Usuario: {$visita['usuario']} - Comentario: {$visita['comentario']}" . PHP_EOL;


    fwrite($abrir, $linea);
    fclose($abrir);

    return true;
}

?>