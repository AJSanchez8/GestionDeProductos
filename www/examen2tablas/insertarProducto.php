<?php

include 'conexion.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $id_fabricante=$_POST["id_fabricante"];

    // IMPORTANTE COMILLAS EN LAS CONSULTAS, EN LA PARTE DE LOS VALUES
    $sql="INSERT INTO producto(nombre, precio, id_fabricante) VALUES ('$nombre','$precio','$id_fabricante')";

    $conexion->query($sql);

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen 2 Tablas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">INSERTAR PRODUCTO</h1>
    <?php
    echo('
    <div class="text-center">
    <a href="index.php" class="link-primary">MOSTRAR TODO</a>
    <a href="insertarFabricante.php" class="link-primary">INSERTAR FABRICANTE</a>
    </div>
    ');

    // Mostrar el select los fabricantes 
    $sqlFabricante="SELECT * FROM fabricante";
    $resultadoFabricante=$conexion->query($sqlFabricante);

    ?>

    <form class="text-center mt-5" method="post" action="insertarProducto.php">

    <input type="text" placeholder="Inserta nombre del producto" name="nombre" required>
    <input type="number" placeholder="Inserta precio del producto" name="precio" required>
    <select class=" mx-auto form-select form-select-sm m-1" style="width: 350px;" name="id_fabricante">
        <?php
        while($row = $resultadoFabricante->fetch_assoc()){
            echo("
            <option value='$row[id]'>$row[nombre]</option>
            
            ");
        }
        
        ?>
    </select>
    <input type="submit" class="btn btn-primary w-3" value="AÑADIR PRODUCTO">

    </form>
</body>
</html>