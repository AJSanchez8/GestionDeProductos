<?php

include 'conexion.php';

if(isset($_GET['idProducto']) && !empty($_GET['idProducto'])) {
    $id = $_GET['idProducto'];

    $sql = "SELECT * FROM producto WHERE id = $id";
    $resultado = $conexion->query($sql);

    // Verificar si se encontraron resultados y obtener los datos
    if($resultado && $resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        // Aquí puedes asignar los valores a variables individuales
        $nombre = $row['nombre'];
        $precio = $row['precio'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PRODUCTO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1>EDITAR PRODUCTO</h1><hr>
    <?php
        // Mostrar el select los fabricantes 
        $sqlFabricante="SELECT * FROM fabricante";
        $resultadoFabricante=$conexion->query($sqlFabricante);
    
    ?>

    <form method="post" action="editarProductoFinal.php">

        <input type="text" <?php echo("value='$nombre'")?> name="nombre" required>
        <input type="number" <?php echo("value='$precio'")?> name="precio" required>
        <input type="hidden" <?php echo("value='$id'")?> name="id">
        <select name="id_fabricante">
                <?php
                while($row = $resultadoFabricante->fetch_assoc()){
                    echo("
                    <option value='$row[id]'>$row[nombre]</option>
                    
                    ");
                }
                
                ?>
        </select>
        <input type="submit" value="EDITAR">




    </form>
</body>
</html>