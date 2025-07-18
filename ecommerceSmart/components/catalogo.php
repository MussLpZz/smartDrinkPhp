<?php
session_start();
require '../conexion.php';

try {
    $stmt = $pdo->query("SELECT * FROM bebidas ORDER BY categoria, nombre");
    $bebidas = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Error al cargar las bebidas: " . $e->getMessage());
}

$categorias = [];
foreach ($bebidas as $bebida) {
    $categorias[$bebida['categoria']][] = $bebida;
}

$nombresCategorias = [
    'mojitos' => 'Mojitos',
    'margaritas' => 'Margaritas',
    'pinas_coladas' => 'Piñas Coladas'
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Catálogo de Bebidas - SmartDrink</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <?php include("navbar.php"); ?>

    <!-- Mensajes de sesión -->
    <main class="max-w-7xl mx-auto p-6 flex-grow">

        <?php
        if (isset($_SESSION['mensaje_exito'])) {
            echo '<div class="max-w-md mx-auto bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded my-4 text-center">'
                . htmlspecialchars($_SESSION['mensaje_exito'])
                . '</div>';
            unset($_SESSION['mensaje_exito']);
        }

        if (isset($_SESSION['mensaje_error'])) {
            echo '<div class="max-w-md mx-auto bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded my-4 text-center">'
                . htmlspecialchars($_SESSION['mensaje_error'])
                . '</div>';
            unset($_SESSION['mensaje_error']);
        }
        ?>

        <div class="mb-8 text-center mt-10 relative">
            <button id="toggleCategorias" class="md:hidden bg-indigo-600 text-white px-4 py-2 rounded focus:outline-none">
                Categorías
            </button>

            <div id="categoriaBotones" class="mt-4 md:mt-0 hidden md:flex md:justify-center flex-wrap gap-2 justify-center">
                <button class="filtro-cat bg-indigo-600 text-white px-3 py-2 rounded text-sm md:text-base focus:outline-none" data-categoria="all">Todas</button>
                <?php foreach ($nombresCategorias as $key => $nombre) : ?>
                    <button class="filtro-cat bg-gray-300 text-gray-800 px-3 py-2 rounded text-sm md:text-base hover:bg-indigo-600 hover:text-white focus:outline-none" data-categoria="<?= $key ?>">
                        <?php if ($key === 'pinas_coladas') : ?>
                            <span class="block md:hidden">Piñas</span>
                            <span class="hidden md:block">Piñas Coladas</span>
                        <?php else : ?>
                            <?= $nombre ?>
                        <?php endif; ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <div id="bebidas-container">
            <?php foreach ($categorias as $clave => $bebidasCat) : ?>
                <section class="mb-12 categoria-bebida" data-categoria="<?= $clave ?>">
                    <h2 class="text-2xl font-semibold mb-6 border-b-2 border-indigo-600 inline-block pb-1">
                        <?= $nombresCategorias[$clave] ?? ucfirst($clave) ?>
                    </h2>

                    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        <?php foreach ($bebidasCat as $bebida) : ?>
                            <article class="bg-white p-5 rounded-lg shadow hover:shadow-lg transition flex flex-col justify-between">
                                <div>
                                    <h3 class="text-xl font-bold text-indigo-700"><?= htmlspecialchars($bebida['nombre']) ?></h3>
                                    <p class="text-gray-600 mt-2 text-sm"><?= htmlspecialchars($bebida['ingredientes']) ?></p>
                                    <p class="mt-4 font-semibold text-gray-800">$<?= number_format($bebida['precio'], 2) ?></p>
                                </div>

                                <?php if (isset($_SESSION['id_usuario'])) : ?>
                                    <a href="agregar_carrito.php?id=<?= $bebida['id'] ?>"
                                       class="mt-4 inline-block text-center bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                                        Agregar
                                    </a>
                                <?php else : ?>
                                    <a href="login.php"
                                       class="mt-4 inline-block text-center bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                                        Inicia sesión para agregar
                                    </a>
                                <?php endif; ?>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>

    </main>

    <?php include("footer.php"); ?>
    <script src="../js/catalogo.js"></script>

</body>
</html>
