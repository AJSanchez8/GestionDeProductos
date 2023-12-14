<?php

include 'conexion.php';

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
    <h1 class="text-center">GESTIÓN DE FÁBRICA</h1>
    <?php
    echo('
    <div class="text-center">
    <a href="insertarProducto.php" class="link-primary">INSERTAR PRODUCTO</a>
    <a href="insertarFabricante.php" class="link-primary">INSERTAR FABRICANTE</a>
    </div>
    <hr>
    ');

    $sqlTodo = "SELECT producto.nombre AS nombreProducto, fabricante.nombre AS nombreFabricante, producto.precio AS precio FROM producto JOIN fabricante ON producto.id_fabricante =fabricante.id ORDER BY nombreProducto ASC";

    $sqlProducto = "SELECT * FROM producto ORDER BY nombre ASC";
    $sqlFabricante="SELECT * FROM fabricante ORDER BY nombre ASC";


    $resultadoTodo = $conexion->query($sqlTodo);
    $resultadoProducto = $conexion->query($sqlProducto);
    $resultadoFabricante=$conexion->query($sqlFabricante);

    echo("<h2 class='text-center'> TABLA GENERAL</h2>");
    echo ("<table class='table table-bordered text-center'>");

    while($row1 = $resultadoTodo->fetch_assoc()){

        echo("
        <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Fabricante</th>
      </tr>
      <tr>
        <td>$row1[nombreProducto]</td>
        <td>$row1[precio]</td>
        <td>$row1[nombreFabricante]</td>
      </tr>
        
        ");
    }    
    echo ("</table><hr>");

    // Tabla de productos para yo no liarme
    echo("<h2 class='text-center'> TABLA DE PRODUCTOS</h2>");
    echo ("<table class='table table-bordered text-center'>");
    while($row2=$resultadoProducto->fetch_assoc()){

        echo("
        <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th></th>
        <th></th>
      </tr>
      <tr>
        <td>$row2[nombre]</td>
        <td>$row2[precio]</td>
        <td>
        <form action='borrarProducto.php' method='get'>
        <input type='hidden' name='idProducto' value='$row2[id]'>
        <input class='btn btn-danger' type='submit' value='Borrar'>
        </form>
        </td>
        <td>
        <form action='editarProductoForm.php' method='get'>
        <input type='hidden' name='idProducto' value='$row2[id]'>
        <input class='btn btn-warning' type='submit' value='Editar'>
        </form>
        
        </td>
      </tr>
        
        ");
    }
    
    echo ("</table><hr>");

        // Tabla de fabricantes para yo no liarme
        echo("<h2 class='text-center'> TABLA DE FABRICANTES</h2>");
        echo ("<table class='table table-bordered text-center'>");
        while($row3=$resultadoFabricante->fetch_assoc()){
    
            echo("
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
          </tr>
          <tr>
            <td>$row3[nombre]</td>
            <td>
            <form action='editarFabricanteForm.php' method='get'>
            <input type='hidden' name='idFabricante' value='$row3[id]'>
            <input class='btn btn-warning' type='submit' value='Editar'>
            </form>
            </td>
          </tr>
            
            ");
        }
        echo ("</table>");



    ?>
</body>
</html>