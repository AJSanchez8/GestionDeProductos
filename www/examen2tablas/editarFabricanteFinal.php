<?php

include 'conexion.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];


    // IMPORTANTE COMILLAS EN LAS CONSULTAS, EN LA PARTE DE LOS VALUES
    $sql="UPDATE `fabricante` SET `nombre`='$nombre'WHERE id = $id ";

    $conexion->query($sql);

    header("Location: index.php");
}




?>