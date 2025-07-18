<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require '../conexion.php';  // PDO ($pdo)

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    if (!$username || !$email || !$password || !$password_confirm) {
        $error = "Todos los campos son obligatorios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "El correo electrónico no es válido.";
    } elseif ($password !== $password_confirm) {
        $error = "Las contraseñas no coinciden.";
    } else {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE usuario = :username OR email = :email");
        $stmt->execute(['username' => $username, 'email' => $email]);
        $existe = $stmt->fetchColumn();

        if ($existe) {
            $error = "El usuario o correo ya están registrados.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, email, password) VALUES (:username, :email, :password)");
            $stmt->execute([
                'username' => $username,
                'email' => $email,
                'password' => $hash
            ]);
            $success = "Registro exitoso. Puedes <a href='/components/login.php'>iniciar sesión</a>.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registro - SmartDrink</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-white">

    <?php include("navbar.php"); ?>

    <section class="relative flex flex-wrap lg:h-[90vh] lg:items-center">
        <div class="w-full px-4 py-12 sm:px-6 sm:py-16 lg:w-1/2 lg:px-8 lg:py-24">
            <div class="mx-auto max-w-lg text-center">
                <h1 class="text-2xl font-bold sm:text-3xl">Regístrate en SmartDrink</h1>
                <p class="mt-4 text-gray-500">
                    Crea tu cuenta para realizar compras seguras y rápidas.
                </p>
            </div>

            <?php if ($error) : ?>
                <div class="bg-red-100 text-red-700 p-4 rounded my-4 max-w-md mx-auto text-center">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php elseif ($success) : ?>
                <div class="bg-green-100 text-green-700 p-4 rounded my-4 max-w-md mx-auto text-center">
                    <?= $success ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="mx-auto mb-0 mt-8 max-w-md space-y-4" novalidate>
                <div>
                    <label for="username" class="sr-only">Usuario</label>
                    <input id="username" name="username" type="text" required
                        class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                        placeholder="Nombre de usuario" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" />
                </div>

                <div>
                    <label for="email" class="sr-only">Correo electrónico</label>
                    <input id="email" name="email" type="email" required
                        class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                        placeholder="Correo electrónico" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
                </div>

                <div>
                    <label for="password" class="sr-only">Contraseña</label>
                    <input id="password" name="password" type="password" required
                        class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                        placeholder="Contraseña" />
                </div>

                <div>
                    <label for="password_confirm" class="sr-only">Confirmar Contraseña</label>
                    <input id="password_confirm" name="password_confirm" type="password" required
                        class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                        placeholder="Confirmar Contraseña" />
                </div>

                <button type="submit"
                    class="inline-block border rounded-lg bg-black px-5 py-3 text-sm font-medium text-white hover:bg-gray-800 transition">
                    Registrar
                </button>

                <p class="text-sm text-gray-500">
                    ¿Ya tienes cuenta?
                    <a href="/components/login.php" class="ml-1 underline">Inicia sesión aquí</a>
                </p>
            </form>
        </div>

        <div class="relative h-64 w-full sm:h-96 lg:h-full lg:w-1/2">
            <!-- <img alt="Registro" src="https://cdn.foodandwineespanol.com/2018/11/coctel.jpg"
                class="absolute inset-0 h-full w-full object-cover" /> -->
        </div>
    </section>

    <?php include("footer.php"); ?>

</body>
</html>
