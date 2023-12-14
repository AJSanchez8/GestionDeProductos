<?php

include 'conexion.php';

if(isset($_GET['idFabricante']) && !empty($_GET['idFabricante'])) {
    $id = $_GET['idFabricante'];

    $sql = "SELECT * FROM fabricante WHERE id = $id";
    $resultado = $conexion->query($sql);

    // Verificar si se encontraron resultados y obtener los datos
    if($resultado && $resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        // Aquí puedes asignar los valores a variables individuales
        $nombre = $row['nombre'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PRODUCTO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">z
</head>
<body>
    <h1>EDITAR FABRICANTE</h1><hr>

    <form method="post" action="editarFabricanteFinal.php">

        <input type="text" <?php echo("value='$nombre'")?> name="nombre" required>
        <input type="hidden" <?php echo("value='$id'")?> name="id">
        <input type="submit" value="EDITAR">




    </form>
</body>
</html>