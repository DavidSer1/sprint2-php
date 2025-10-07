<?php 


function escaparate(){

$productos = [
    [
        "referencia" => "ref1",
        "descripcion" => "Descripción articulo 1",
        "precio" => 5
    ],
    [
        "referencia" => "ref2",
        "descripcion" => "Descripción articulo 2",
        "precio" => 3
    ],
    [
        "referencia" => "ref3",
        "descripcion" => "Descripción articulo 3",
        "precio" => 2
    ]
  
];

  $tabla = '<table border="1" cellpadding="5" cellspacing="0">';
    $tabla .= '<tr>
                 <th>Referencia</th>
                 <th>Descripción</th>
                 <th>Precio </th>
                 <th>  </th>
               </tr>';

    foreach ($productos as $producto) {
        $tabla .= '<tr>';
        $tabla .= '<td>' . $producto["referencia"] . '</td>';
        $tabla .= '<td>' . $producto["descripcion"] . '</td>';
        $tabla .= '<td>' . $producto["precio"] . '</td>';
        $tabla .= '<td><a href="añadiralcarro.php?referencia=' . $producto['referencia'] . '">Comprar</a></td>';

        $tabla .= '</tr>';
    }

    $tabla .= '</table>';
    return $tabla;

}


function mostrar_carrito(){


}

?>