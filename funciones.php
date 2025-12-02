<?php 
require_once "Conexion.class.php";

function insertarcliente($dni,$nombre,$direccion,$localidad,$provincia,$telefono,$email,$hash){
   
$conexion = Conexion::obtenerconexion();
$consulta = $conexion->prepare("insert into clientes (dni,nombre,direccion,
localidad,provincia,telefono,email,password)
 values (:dni, :nombre , :direccion , :localidad, :provincia, :telefono, :email, :password)");
 $rows = $consulta->execute([':dni'=> $dni, 
 ':nombre'=> $nombre, ':direccion'=> $direccion, 
 ':localidad'=> $localidad, ':provincia'=> $provincia, ':telefono' => $telefono, ':email'=> $email, ":password" => $hash]);

 if($rows == 1){
    return true;
 } else{
    return false;
 }

}

function eliminarcliente($dni){
   $conexion = Conexion::obtenerconexion();
   $consulta = $conexion->prepare("delete  from clientes where dni = :dni");
   $rows =  $consulta->execute([':dni'=> $dni]);
   if($rows > 0){
      return true;
   } else{
      return false;
   }

}

function editarcliente($dni, $nombre, $direccion, $localidad, $provincia, $telefono, $email){

    $conexion = Conexion::obtenerconexion();

    $consulta = $conexion->prepare("UPDATE clientes 
        SET nombre = :nombre,
            direccion = :direccion,
            localidad = :localidad, 
            provincia = :provincia,
            telefono = :telefono,
            email = :email
        WHERE dni = :dni");

    $consulta->execute([
        ':nombre' => $nombre, 
        ':direccion' => $direccion, 
        ':localidad' => $localidad,
        ':provincia' => $provincia, 
        ':telefono' => $telefono,
        ':email' => $email,
        ':dni' => $dni
    ]);

    return $consulta->rowCount() > 0;
}


function login($nombre, $contra){
    $conexion = Conexion::obtenerconexion();
    $consulta = $conexion->prepare("SELECT * FROM clientes WHERE nombre = :nombre LIMIT 1");
    $consulta->execute([':nombre' => $nombre]);
    $cliente = $consulta->fetch(PDO::FETCH_ASSOC);

    if($cliente && password_verify($contra, $cliente['password'])){
        return true;
    } else {
        return false;
    }
}
function obtenerPermisos($nombre) {
    $conexion = Conexion::obtenerconexion();
    $stmt = $conexion->prepare("SELECT rol FROM clientes WHERE nombre = :nombre LIMIT 1");
    $stmt->execute([':nombre' => $nombre]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if($usuario){
        return $usuario['rol']; // puede ser un string o lista de permisos
    } else {
        return false;
    }
}





?>