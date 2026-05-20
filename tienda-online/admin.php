<?php

require_once("conexion.php");

$sql = $conexion->prepare("SELECT * FROM productos");

$sql->execute();

$productos = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Panel Admin</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-pink-50 p-10">

<h1 class="text-4xl font-bold text-pink-600 mb-8">
Panel de Administración
</h1>

<a href="crear.php"
class="bg-pink-500 text-white px-6 py-3 rounded-lg">

Agregar Producto

</a>

<div class="overflow-x-auto mt-8">

<table class="w-full bg-white shadow-lg rounded-xl overflow-hidden">

<thead class="bg-pink-500 text-white">

<tr>

<th class="p-4">Imagen</th>

<th class="p-4">Título</th>

<th class="p-4">Precio</th>

<th class="p-4">Stock</th>

<th class="p-4">Acciones</th>

</tr>

</thead>

<tbody>

<?php foreach($productos as $producto){ ?>

<tr class="border-b">

<td class="p-4">

<img
src="img/<?php echo $producto['imagen']; ?>"
class="w-20 h-20 object-cover rounded">

</td>

<td class="p-4">

<?php echo $producto['nombre']; ?>

</td>

<td class="p-4">

<?php echo $producto['precio']; ?>€

</td>

<td class="p-4">

<?php echo $producto['stock']; ?>

</td>

<td class="p-4 flex gap-3">

<a
href="editar.php?id=<?php echo $producto['id']; ?>"
class="bg-blue-500 text-white px-4 py-2 rounded">

Editar

</a>

<a
href="eliminar.php?id=<?php echo $producto['id']; ?>"
class="bg-red-500 text-white px-4 py-2 rounded">

Eliminar

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</body>
</html>