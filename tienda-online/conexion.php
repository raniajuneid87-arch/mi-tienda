<?php

$host = "localhost";
$dbname = "tienda_online";
$user = "root";
$password = "";

try {

    $conexion = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $user,
        $password
    );

    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch(PDOException $e){

    echo "Error de conexión: " . $e->getMessage();

}

?>