<?php 

class Cliente{
private $dni;
private $nombre;
private $direccion;
private $localidad;
private $provincia;
private $telefono;
private $email;


public function muestra(){
    try { 
        include "funciones.php";
        $conexion = obtenerconexion();

        $stmt= $conexion->prepare('SELECT * FROM Cliente');
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cliente');

 
        echo '<table  cellpadding="5" cellspacing="0">
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Localidad</th>
                    <th>Provincia</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>';

        while($usuario = $stmt->fetch()) {
            echo '<tr>
                    <td>' . htmlspecialchars($usuario->dni) . '</td>
                    <td>' . htmlspecialchars($usuario->nombre) . '</td>
                    <td>' . htmlspecialchars($usuario->direccion) . '</td>
                    <td>' . htmlspecialchars($usuario->localidad) . '</td>
                    <td>' . htmlspecialchars($usuario->provincia) . '</td>
                    <td>' . htmlspecialchars($usuario->telefono) . '</td>
                    <td>' . htmlspecialchars($usuario->email) . '</td>
                    <td><a href="editarcliente.php?dni=' . urlencode($usuario->dni) . '">Editar</a></td>
                    <td><a href="borrarcliente.php?dni=' . urlencode($usuario->dni) . '">Eliminar</a></td>
                  </tr>';
        }

        echo '</table>';

    } catch(PDOException $e) {
        echo "Error: "  . $e->getMessage();
    }
}


}

?>