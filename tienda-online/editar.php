<?php

require_once("conexion.php");

$id = $_GET['id'];

$sql = $conexion->prepare(
"SELECT * FROM productos WHERE id=?"
);

$sql->execute([$id]);

$producto = $sql->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['actualizar'])){

    $titulo = $_POST['titulo'];

    $descripcion = $_POST['descripcion'];

    $precio = $_POST['precio'];

    $stock = $_POST['stock'];

    $categoria = $_POST['categoria'];

    if($_FILES['imagen']['name'] != ""){

        $imagen = $_FILES['imagen']['name'];

        move_uploaded_file(
            $_FILES['imagen']['tmp_name'],
            "uploads/" . $imagen
        );

    } else {

        $imagen = $producto['imagen'];

    }

    $update = $conexion->prepare(

        "UPDATE productos SET

        titulo=?,
        descripcion=?,
        precio=?,
        stock=?,
        imagen=?,
        categoria=?

        WHERE id=?"

    );

    $update->execute([

        $titulo,
        $descripcion,
        $precio,
        $stock,
        $imagen,
        $categoria,
        $id

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

<title>Editar Producto</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-pink-50 p-10">

<h1 class="text-4xl font-bold text-pink-600 mb-8">

Editar Producto

</h1>

<form
method="POST"
enctype="multipart/form-data"
class="bg-white p-8 rounded-2xl shadow-lg max-w-2xl">

<div class="mb-4">

<label class="font-bold">
Título
</label>

<input
type="text"
name="titulo"
value="<?php echo $producto['titulo']; ?>"
class="w-full border p-3 rounded-lg">

</div>

<div class="mb-4">

<label class="font-bold">
Descripción
</label>

<textarea
name="descripcion"
class="w-full border p-3 rounded-lg h-32"><?php echo $producto['descripcion']; ?></textarea>

</div>

<div class="mb-4">

<label class="font-bold">
Precio
</label>

<input
type="number"
step="0.01"
name="precio"
value="<?php echo $producto['precio']; ?>"
class="w-full border p-3 rounded-lg">

</div>

<div class="mb-4">

<label class="font-bold">
Stock
</label>

<input
type="number"
name="stock"
value="<?php echo $producto['stock']; ?>"
class="w-full border p-3 rounded-lg">

</div>

<div class="mb-4">

<label class="font-bold">
Categoría
</label>

<input
type="text"
name="categoria"
value="<?php echo $producto['categoria']; ?>"
class="w-full border p-3 rounded-lg">

</div>

<div class="mb-4">

<label class="font-bold">
Imagen actual
</label>

<img
src="uploads/<?php echo $producto['imagen']; ?>"
class="w-40 rounded-lg mb-4">

<input
type="file"
name="imagen"
class="w-full border p-3 rounded-lg">

</div>

<button
type="submit"
name="actualizar"
class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-lg">

Actualizar Producto

</button>

</form>

</body>
</html>