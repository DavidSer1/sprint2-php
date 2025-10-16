<?php 

class Cliente{
private $dni;
private $nombre;
private $direccion;
private $localidad;
private $provincia;
private $telefono;
private $email;


public function devuelvetodo(){

return "<b> Dni  </b>    " .  $this->dni . '<br>' . "<b>  Nombre </b>   "  .  $this->nombre  . '<br>' . "<b>  Nombre  </b>  "  . $this->direccion 
 . '<br>' . " <b> Localidad  </b>   "  .  $this->localidad  . '<br>' . " <b> Provincia </b>    "   . $this->provincia  . '<br>' . "<b>Telefono</b>      " . 
 $this->telefono  . '<br>' .  " <b> Email   </b>    "  .  $this->email;


}
public function muestra(){
    try{ 
        include "funciones.php";
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