<?php
session_start();
require_once '../conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$carrito = $_SESSION['carrito'];
$compraExitosa = false;

if (isset($_GET['finalizar']) && !empty($carrito)) {
    $usuarioId = $_SESSION['id_usuario'];

    try {
        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        $pdo->beginTransaction();

        $stmt = $pdo->prepare("INSERT INTO pedidos (usuario_id, total) VALUES (?, ?)");
        $stmt->execute([$usuarioId, $total]);
        $pedidoId = $pdo->lastInsertId();

        $stmtItem = $pdo->prepare("INSERT INTO pedido_items (pedido_id, bebida_id, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");
        foreach ($carrito as $item) {
            $stmtItem->execute([
                $pedidoId,
                $item['id'],
                $item['cantidad'],
                $item['precio']
            ]);
        }

        $pdo->commit();

        $_SESSION['carrito'] = [];
        $carrito = [];
        $compraExitosa = true;

    } catch (PDOException $e) {
        $pdo->rollBack();
        die("Error al registrar el pedido: " . $e->getMessage());
    }
}

if (isset($_GET['eliminar_id'])) {
    $idEliminar = (int) $_GET['eliminar_id'];
    foreach ($_SESSION['carrito'] as $key => $item) {
        if ($item['id'] == $idEliminar) {
            unset($_SESSION['carrito'][$key]);
            $_SESSION['carrito'] = array_values($_SESSION['carrito']);
            break;
        }
    }
    header('Location: cart.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Carrito de Compras - SmartDrink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

<?php include("navbar.php"); ?>

<main class="flex-grow w-full max-w-5xl mx-auto px-4 py-12 sm:px-6 lg:px-8 flex flex-col">
    <?php if ($compraExitosa): ?>
        <div class="max-w-md mx-auto bg-green-100 border border-green-400 text-green-700 px-4 py-6 rounded flex items-center space-x-4 shadow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <p class="text-lg font-semibold">¡Compra realizada correctamente! Revisa tu correo para más detalles.</p>
        </div>
        <div class="mt-8 text-center">
            <a href="catalogo.php" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded hover:bg-indigo-700 transition">Volver al catálogo</a>
        </div>
    <?php else: ?>

        <h1 class="text-3xl font-bold mb-8 text-center sm:text-left">Tu Carrito de Compras</h1>

        <?php if (empty($carrito)) : ?>
            <p class="text-gray-700 text-center sm:text-left">Tu carrito está vacío.</p>
            <div class="mt-6 text-center sm:text-left">
                <a href="catalogo.php" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">Ver catálogo</a>
            </div>
        <?php else: ?>

            <!-- Tabla -->
            <div class="w-full overflow-x-auto mb-6">
                <table class="min-w-full border-collapse text-sm sm:text-base">
                    <thead>
                        <tr>
                            <th class="border-b py-3 px-4 text-left md:text-center">Producto</th>
                            <th class="border-b py-3 px-4 text-left md:text-center">Cantidad</th>
                            <th class="border-b py-3 px-4 text-left md:text-center">Precio unitario</th>
                            <th class="border-b py-3 px-4 text-left md:text-center">Subtotal</th>
                            <th class="border-b py-3 px-4 text-left md:text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0;
                        foreach ($carrito as $item): 
                            $subtotal = $item['precio'] * $item['cantidad'];
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td class="border-b py-3 px-4 text-left md:text-center"><?= htmlspecialchars($item['nombre']) ?></td>
                                <td class="border-b py-3 px-4 text-left md:text-center"><?= $item['cantidad'] ?></td>
                                <td class="border-b py-3 px-4 text-left md:text-center">$<?= number_format($item['precio'], 2) ?></td>
                                <td class="border-b py-3 px-4 text-left md:text-center">$<?= number_format($subtotal, 2) ?></td>
                                <td class="border-b py-3 px-4 text-left md:text-center">
                                    <a href="cart.php?eliminar_id=<?= $item['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('¿Seguro que quieres eliminar este producto?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Botones pegados debajo -->
            <div class="w-full bg-white border-t border-gray-200 pt-4 pb-6 flex flex-col sm:flex-row justify-between items-center gap-6">
                <div class="text-center sm:text-left">
                    <p class="text-lg font-semibold text-gray-800">Total:</p>
                    <p class="text-2xl font-bold text-green-700">$<?= number_format($total, 2) ?></p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                    <a href="catalogo.php" class="w-full sm:w-auto bg-gray-600 text-white px-6 py-3 rounded text-center hover:bg-gray-700 transition">
                        Seguir comprando
                    </a>
                    <a href="cart.php?finalizar=1" class="w-full sm:w-auto bg-green-600 text-white px-6 py-3 rounded text-center hover:bg-green-700 transition">
                        Finalizar compra
                    </a>
                </div>
            </div>

        <?php endif; ?>
    <?php endif; ?>
</main>

<?php include("footer.php"); ?>

</body>
</html>
                            