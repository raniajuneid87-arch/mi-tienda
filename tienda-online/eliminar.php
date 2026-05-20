<?php

require_once("conexion.php");

$id = $_GET['id'];

$sql = $conexion->prepare(

    "DELETE FROM productos WHERE id=?"

);

$sql->execute([$id]);

header("Location: admin.php");

?>