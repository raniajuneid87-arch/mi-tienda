<?php

require_once("conexion.php");

if(isset($_POST['guardar'])){

    $titulo = $_POST['titulo'];

    $descripcion = $_POST['descripcion'];

    $precio = $_POST['precio'];

    $stock = $_POST['stock'];

    $categoria = $_POST['categoria'];

    $imagen = $_FILES['imagen']['name'];

    move_uploaded_file(

        $_FILES['imagen']['tmp_name'],

        "uploads/" . $imagen

    );

    $sql = $conexion->prepare(

        "INSERT INTO productos

        (titulo, descripcion, precio, stock, imagen, categoria)

        VALUES (?, ?, ?, ?, ?, ?)"

    );

    $sql->execute([

        $titulo,
        $descripcion,
        $precio,
        $stock,
        $imagen,
        $categoria

    ]);

    header("Location: admin.php");

}

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Crear Producto</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-pink-50 p-10">

<h1 class="text-4xl font-bold text-pink-600 mb-8">

Agregar Producto

</h1>

<form
method="POST"
enctype="multipart/form-data"
class="bg-white p-8 rounded-2xl shadow-lg max-w-2xl">

<!-- TITULO -->
<div class="mb-4">

<label class="font-bold block mb-2">

Título

</label>

<input
type="text"
name="titulo"
required
class="w-full border border-pink-300 p-3 rounded-lg">

</div>

<!-- DESCRIPCIÓN -->
<div class="mb-4">

<label class="font-bold block mb-2">

Descripción

</label>

<textarea
name="descripcion"
required
class="w-full border border-pink-300 p-3 rounded-lg h-32"></textarea>

</div>

<!-- PRECIO -->
<div class="mb-4">

<label class="font-bold block mb-2">

Precio

</label>

<input
type="number"
step="0.01"
name="precio"
required
class="w-full border border-pink-300 p-3 rounded-lg">

</div>

<!-- STOCK -->
<div class="mb-4">

<label class="font-bold block mb-2">

Stock

</label>

<input
type="number"
name="stock"
required
class="w-full border border-pink-300 p-3 rounded-lg">

</div>

<!-- CATEGORIA -->
<div class="mb-4">

<label class="font-bold block mb-2">

Categoría

</label>

<input
type="text"
name="categoria"
required
class="w-full border border-pink-300 p-3 rounded-lg">

</div>

<!-- IMAGEN -->
<div class="mb-6">

<label class="font-bold block mb-2">

Imagen

</label>

<input
type="file"
name="imagen"
required
class="w-full border border-pink-300 p-3 rounded-lg">

</div>

<!-- BOTON -->
<button
type="submit"
name="guardar"
class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-lg">

Guardar Producto

</button>

</form>

</body>
</html>