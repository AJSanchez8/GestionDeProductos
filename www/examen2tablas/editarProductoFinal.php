<?php

include 'conexion.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $id_fabricante=$_POST["id_fabricante"];

    // IMPORTANTE COMILLAS EN LAS CONSULTAS, EN LA PARTE DE LOS VALUES
    $sql="UPDATE `producto` SET `nombre`='$nombre',`precio`='$precio',`id_fabricante`='$id_fabricante' WHERE id = $id ";

    $conexion->query($sql);

    header("Location: index.php");
}




?>