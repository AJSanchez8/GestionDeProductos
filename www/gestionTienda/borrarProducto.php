<?php

include 'conexion.php';

if(isset($_GET['idProducto']) && !empty($_GET["idProducto"])){
    $id = $_GET["idProducto"];

$sql = "DELETE FROM producto WHERE id='$id'";

$conexion->query($sql);


header("Location: index.php");
exit();

}





?>