<?php 
include "funciones.php";
class Cliente{
private $dni;
private $nombre;
private $direccion;
private $localidad;
private $provincia;
private $telefono;
private $email;



public function devuelvetodo(){

return $this->dni . '<br>' . $this->nombre  . '<br>' . $this->direccion 
 . '<br>' . $this->localidad  . '<br>' . $this->provincia  . '<br>' . $this->telefono  . '<br>' . $this->email;


}
public function muestra(){
    try{ 
    $conexion = obtenerconexion();
   
    $stmt= $conexion->prepare('select * from Cliente');
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
    while($usuario = $stmt->fetch())
        echo $usuario->devuelvetodo() . '<br />';
}
catch(PDOException $e){
    echo "Error: "  . $e->getMessage();
}
}

}
?>