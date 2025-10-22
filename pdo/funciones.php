<?php 

function obtenerconexion(){
try{ 
    $conexion = new PDO('mysql:host=localhost;dbname=Clientes', 'david' , 'Destruct0r!2025');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conexion;
}

catch(PDOException $e){

    echo "Error conectandose en la base de datos" . $e->getMessage();
    return null;
}
finally{
    $conexion = null;
}
}


function validar($dni, $nombre, $direccion, $localidad, $provincia, $telefono, $email) {
    // Quitar espacios extra
    $dni = trim($dni);
    $nombre = trim($nombre);
    $direccion = trim($direccion);
    $localidad = trim($localidad);
    $provincia = trim($provincia);
    $telefono = trim($telefono);
    $email = trim($email);

    // Validar campos vacíos
    if (empty($dni) || empty($nombre) || empty($direccion) || empty($localidad) ||
        empty($provincia) || empty($telefono) || empty($email)) {
        return "Todos los campos son obligatorios.";
    }

    if (!preg_match("/^[0-9]{8}[A-Za-z]$/", $dni)) {
        return "El DNI debe tener 8 números seguidos de una letra (ej: 12345678A).";
    }

    if (!preg_match("/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/", $nombre)) {
        return "El nombre solo puede contener letras y espacios.";
    }

    if (!preg_match("/^[0-9]{9}$/", $telefono)) {
        return "El teléfono debe tener 9 dígitos numéricos.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "El formato del correo electrónico no es válido.";
    }

    return true;
}





?>