<?php

include 'conexion.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $nombre = $_POST["nombre"];

    // IMPORTANTE COMILLAS EN LAS CONSULTAS, EN LA PARTE DE LOS VALUES
    $sql="INSERT INTO fabricante(`nombre`) VALUES ('$nombre')";

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
    <h1 class="text-center">INSERTAR FABRICANTE</h1>
    <?php
    echo('
    <div class="text-center">
    <a href="index.php" class="link-primary">MOSTRAR TODO</a>
    <a href="insertarProducto.php" class="link-primary">INSERTAR PRODUCTO</a>
    </div>
    ');
    ?>

    <form class="text-center mt-5" method="post" action="insertarFabricante.php">
        <input type="text" placeholder="Inserta nombre del fabricante" name="nombre">
        <input class="btn btn-primary" submit" value="AÑADIR FABRICANTE">
    </form>
</body>
</html>