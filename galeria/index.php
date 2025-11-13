<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nombre = $_POST["nombre"];
    $imagen = $_POST["fileToUpload"];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de nombre i  imagenes</title>
</head>
<body>
    

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="nombre"><br>

<input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Enviar" name="submit">
</form>

</body>
</html>