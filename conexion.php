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

} catch(PDOException $error){

    echo "Error de conexión: " . $error->getMessage();

}

?>