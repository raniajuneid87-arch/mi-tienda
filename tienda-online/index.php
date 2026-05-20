<?php

include("conexion.php");

$sql = $conexion->prepare("SELECT * FROM productos");

$sql->execute();

$productos = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Lazos Shop</title>

    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="bg-pink-50 text-gray-800">

<!-- NAVBAR -->
<nav class="bg-white shadow-md sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-3xl font-bold text-pink-600">
            🎀 Lazos Shop
        </h1>

        <div class="hidden md:flex gap-6 font-medium">

            <a href="#inicio" class="hover:text-pink-500">
                Inicio
            </a>

            <a href="#catalogo" class="hover:text-pink-500">
                Catálogo
            </a>

            <a href="#categorias" class="hover:text-pink-500">
                Categorías
            </a>

            <a href="#nosotros" class="hover:text-pink-500">
                Nosotros
            </a>

            <a href="#contacto" class="hover:text-pink-500">
                Contacto
            </a>

            <a href="admin.php"
            class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">

                Admin

            </a>

        </div>

    </div>

</nav>

<!-- HERO -->
<section
id="inicio"
class="bg-pink-200 py-24 px-6 text-center">

    <h2 class="text-5xl font-bold mb-6">

        Lazos elegantes para cada ocasión

    </h2>

    <p class="text-lg max-w-2xl mx-auto mb-8">

        Descubre accesorios únicos hechos con amor,
        calidad y estilo para complementar tu look.

    </p>

    <button
    class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-4 rounded-xl shadow-lg">

        Comprar Ahora

    </button>

</section>

<!-- FRASE -->
<section class="py-14 text-center px-6">

    <p class="text-3xl italic text-pink-600 font-semibold">

        “Los pequeños detalles crean grandes estilos”

    </p>

</section>

<!-- DESCRIPCIÓN -->
<section class="max-w-5xl mx-auto text-center px-6 pb-20">

    <h3 class="text-4xl font-bold mb-6">

        Nuestra Tienda

    </h3>

    <p class="text-gray-600 leading-relaxed text-lg">

        En Lazos Shop diseñamos accesorios delicados,
        modernos y exclusivos para niñas y mujeres.
        Cada lazo está pensado para aportar elegancia,
        personalidad y un toque especial a cualquier look.

    </p>

</section>

<!-- CATEGORÍAS -->
<section
id="categorias"
class="bg-white py-20 px-6">

    <h3 class="text-4xl font-bold text-center mb-14">

        Categorías

    </h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">

        <!-- NOVEDADES -->
        <div class="bg-pink-100 rounded-2xl p-10 text-center shadow-lg">

            <h4 class="text-2xl font-bold mb-4">
                🎀 Novedades
            </h4>

            <p class="text-gray-600">

                Descubre los últimos diseños y tendencias.

            </p>

        </div>

        <!-- REGALOS -->
        <div class="bg-pink-100 rounded-2xl p-10 text-center shadow-lg">

            <h4 class="text-2xl font-bold mb-4">
                🎁 Para Regalar
            </h4>

            <p class="text-gray-600">

                Detalles perfectos para sorprender.

            </p>

        </div>

        <!-- PROMOS -->
        <div class="bg-pink-100 rounded-2xl p-10 text-center shadow-lg">

            <h4 class="text-2xl font-bold mb-4">
                ✨ Promociones
            </h4>

            <p class="text-gray-600">

                Packs y descuentos especiales.

            </p>

        </div>

    </div>

</section>

<!-- CATÁLOGO -->
<section
id="catalogo"
class="py-20 px-6">

    <h3 class="text-4xl font-bold text-center mb-14">

        Catálogo de Productos

    </h3>

    <!-- GRID PRODUCTOS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 max-w-7xl mx-auto">

    <?php foreach($productos as $producto){ ?>

        <!-- CARD -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:scale-105 transition duration-300">

            <!-- IMAGEN -->
            <img
            src="img/<?php echo $producto['imagen']; ?>"
            class="w-full h-80 object-cover
            <?php if($producto['stock'] <= 0){ ?>
                grayscale opacity-70
            <?php } ?>
            ">

            <!-- CONTENIDO -->
            <div class="p-6">

                <!-- ESTADO -->
                <?php if($producto['stock'] > 0){ ?>

                    <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full">

                        Disponible

                    </span>

                <?php } else { ?>

                    <span class="bg-gray-500 text-white text-xs px-3 py-1 rounded-full">

                        Agotado

                    </span>

                <?php } ?>

                <!-- TITULO -->
                <h4 class="text-2xl font-bold mt-4">

                    <?php echo $producto['nombre']; ?>

                </h4>

                <!-- DESCRIPCION -->
                <p class="text-gray-600 mt-3 leading-relaxed">

                    <?php echo $producto['descripcion']; ?>

                </p>

                <!-- INFO -->
                <div class="mt-6 flex justify-between items-center">

                    <div>

                        <p class="text-pink-600 text-2xl font-bold">

                            <?php echo $producto['precio']; ?>€

                        </p>

                        <p class="text-sm text-gray-500">

                            Stock:
                            <?php echo $producto['stock']; ?>

                        </p>

                    </div>

                    <?php if($producto['stock'] > 0){ ?>

                        <button
                        class="bg-pink-500 hover:bg-pink-600 text-white px-5 py-3 rounded-xl">

                            Comprar

                        </button>

                    <?php } else { ?>

                        <button
                        class="bg-gray-400 text-white px-5 py-3 rounded-xl cursor-not-allowed">

                            Sin Stock

                        </button>

                    <?php } ?>

                </div>

            </div>

        </div>

    <?php } ?>

    </div>

</section>

<!-- NOSOTROS -->
<section
id="nosotros"
class="bg-white py-20 px-6">

    <h3 class="text-4xl font-bold text-center mb-14">

        Sobre Nosotros

    </h3>

    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-14 items-center">

        <!-- IMAGEN -->
        <img
        src="img/nosotross.png"
        class="rounded-2xl shadow-lg">

        <!-- TEXTO -->
        <div>

            <h4 class="text-3xl font-bold mb-6">

                Nuestra Historia

            </h4>

            <p class="text-gray-600 leading-relaxed mb-5">

                Lazos Shop nació como un proyecto artesanal
                enfocado en crear accesorios únicos y delicados.

            </p>

            <p class="text-gray-600 leading-relaxed mb-5">

                Cada producto está diseñado con materiales
                de calidad y cuidando cada detalle.

            </p>

            <p class="text-gray-600 leading-relaxed">

                Nuestro objetivo es ofrecer accesorios elegantes,
                modernos y especiales para cualquier ocasión.

            </p>

        </div>

    </div>

</section>

<!-- CONTACTO -->
<section
id="contacto"
class="py-20 px-6">

    <h3 class="text-4xl font-bold text-center mb-14">

        Contacto

    </h3>

    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12">

        <!-- FORMULARIO -->
        <form class="bg-white p-10 rounded-2xl shadow-lg">

            <div class="mb-5">

                <input
                type="text"
                placeholder="Nombre"
                class="w-full border border-pink-300 p-4 rounded-xl">

            </div>

            <div class="mb-5">

                <input
                type="email"
                placeholder="Correo"
                class="w-full border border-pink-300 p-4 rounded-xl">

            </div>

            <div class="mb-5">

                <textarea
                placeholder="Mensaje"
                class="w-full border border-pink-300 p-4 rounded-xl h-40"></textarea>

            </div>

            <button
            class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-4 rounded-xl w-full">

                Enviar Mensaje

            </button>

        </form>

        <!-- INFO -->
        <div class="flex flex-col justify-center">

            <h4 class="text-3xl font-bold mb-8">

                Información de Contacto

            </h4>

            <div class="space-y-5 text-lg">

                <p class="flex items-center gap-3">

                    <i class="fa fa-instagram text-pink-500 text-2xl"></i>

                    Instagram: @lazosshop

                </p>

                <p class="flex items-center gap-3">

                    <i class="fa fa-facebook text-blue-600 text-2xl"></i>

                    Facebook: Lazos Shop

                </p>

                <p class="flex items-center gap-3">

                    <i class="fa fa-map-marker text-red-500 text-2xl"></i>

                    Granada, España

                </p>

            </div>

        </div>

    </div>

</section>

<!-- FOOTER -->
<footer class="bg-pink-600 text-white py-12 px-6">

    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">

        <!-- TIENDA -->
        <div>

            <h4 class="text-2xl font-bold mb-5">

                Lazos Shop

            </h4>

            <p class="leading-relaxed">

                Tienda online especializada en lazos y
                accesorios para el cabello.

            </p>

        </div>

        <!-- INFO -->
        <div>

            <h4 class="text-2xl font-bold mb-5">

                Información

            </h4>

            <ul class="space-y-3">

                <li>Envíos</li>

                <li>Política de Privacidad</li>

                <li>Promociones</li>

            </ul>

        </div>

        <!-- CONTACTO -->
        <div>

            <h4 class="text-2xl font-bold mb-5">

                Contacto

            </h4>

            <p class="flex items-center gap-3">

                <i class="fa fa-envelope"></i>

                contacto@lazos.com

            </p>

            <p class="flex items-center gap-3 mt-4">

                <i class="fa fa-map-marker"></i>

                Granada, España

            </p>

        </div>

    </div>

    <!-- COPYRIGHT -->
    <div class="text-center mt-16 border-t border-pink-400 pt-6">

        <div class="flex justify-center items-center gap-2">

            <i class="fa fa-copyright"></i>

            <p>

                2026 Lazos Shop - Todos los derechos reservados

            </p>

        </div>

    </div>

</footer>

</body>
</html>