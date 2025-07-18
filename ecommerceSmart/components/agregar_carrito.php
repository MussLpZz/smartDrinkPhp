<?php
session_start();
require '../conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: catalogo.php");
    exit;
}

$idBebida = (int) $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM bebidas WHERE id = ?");
$stmt->execute([$idBebida]);
$bebida = $stmt->fetch();

if (!$bebida) {
    header("Location: catalogo.php");
    exit;
}

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$existe = false;
foreach ($_SESSION['carrito'] as &$item) {
    if ($item['id'] == $idBebida) {
        $item['cantidad']++;
        $existe = true;
        break;
    }
}
unset($item);

if (!$existe) {
    $_SESSION['carrito'][] = [
        'id' => $bebida['id'],
        'nombre' => $bebida['nombre'],
        'precio' => $bebida['precio'],
        'cantidad' => 1
    ];
}

// Aquí seteamos el mensaje para mostrar en catalogo.php
$_SESSION['mensaje_exito'] = "Producto agregado correctamente.";

header("Location: catalogo.php");
exit;
