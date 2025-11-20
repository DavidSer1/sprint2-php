<?php 
include "Conexion.class.php";
class Cliente{

private $dni;    
private $nombre;   
private $direccion;   
private $localidad;   
private $provincia;   
private $telefono;   
private $email;   


public static function obtenertodos(){

$conexion = Conexion::obtenerconexion();
$consulta = $conexion->prepare("select * from clientes");
$consulta->execute([]);
$consulta->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
return $consulta->fetchAll();

}
public function getDNI(){
return $this->dni;
}
public function getnombre(){
    return $this->nombre;
}
public function getdireccion(){
    return $this->direccion;
}
public function getlocalidad(){
    return $this->localidad;
}
public function getprovincia(){
    return $this->provincia;
}
public function gettelefono(){
    return $this->telefono;
}
public function getemail(){
    return $this->email;
}

}








?>