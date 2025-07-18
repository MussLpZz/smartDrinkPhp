<?php
$host = 'sql204.infinityfree.com';
$db   = 'if0_39464726_smartdb';
$user = 'if0_39464726';
$pass = 'Dzi5e9anBymuZ';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Error en la conexión: ' . $e->getMessage());
}
?>
