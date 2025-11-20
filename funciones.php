<?php 
include "Conexion.class.php";

function insertarcliente($dni,$nombre,$direccion,$localidad,$provincia,$telefono,$email){
$conexion = Conexion::obtenerconexion();
$consulta = $conexion->prepare("insert into clientes (dni,nombre,direccion,
localidad,provincia,telefono,email)
 values (:dni, :nombre , :direccion , :localidad, :provincia, :telefono, :email)");
 $rows = $consulta->execute([':dni'=> $dni, 
 ':nombre'=> $nombre, ':direccion'=> $direccion, 
 ':localidad'=> $localidad, ':provincia'=> $provincia, ':telefono' => $telefono, ':email'=> $email]);

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

function editarcliente($dni,$nombre,$direccion,$localidad,$provincia,$telefono,$email){

   $conexion = Conexion::obtenerconexion();

  $consulta = $conexion->prepare("update clientes set mombre = :nombre,
  direccion = :direccion,localidad = :localidad, provincia = :provincia,
   telefono = :telefono , email = :email where dni = :dni ");
 
   $rows = $consulta->execute([':dni'=>$dni, ':nombre' => $nombre, 
   ':direccion' => $direccion, ':localidad'=> $localidad,
    ':provincia' => $provincia, ':telefono' =>$telefono, ":email" => $email]);

    if($rows > 0){
      return true;
    }
    else{
      return false;
    }
}



?>