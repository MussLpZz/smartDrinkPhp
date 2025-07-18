<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../conexion.php';

$error = '';
$success = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $error = "Por favor, completa todos los campos.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            $_SESSION['usuario']   = $usuario['usuario'];
            $_SESSION['id_usuario'] = $usuario['id'];
            $_SESSION['email']     = $usuario['email'];

            $success = "Inicio de sesión exitoso. Bienvenido, " . htmlspecialchars($usuario['usuario']) . "!";
            // Aquí la redirección original que quieres conservar:
            echo "<meta http-equiv='refresh' content='2;url=/components/catalogo.php'>";
        } else {
            $error = "Correo o contraseña incorrectos.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - SmartDrink</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white min-h-screen flex flex-col">

<?php include("navbar.php"); ?>

<!-- Contenedor principal blanco que ocupa toda la pantalla -->
<section class="flex-grow flex justify-center items-center bg-white min-h-[100vh] px-4 sm:px-6 lg:px-8">
  <div class="w-full max-w-md py-12 flex flex-col justify-center">
    <div class="text-center mb-6">
      <h1 class="text-2xl font-bold sm:text-3xl">Inicia Sesión en SmartDrink</h1>
      <p class="mt-2 text-gray-500 text-sm sm:text-base">Usa tu correo electrónico y contraseña para acceder.</p>
    </div>

    <?php if ($error): ?>
      <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>
    <?php if ($success): ?>
      <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
        <?= htmlspecialchars($success) ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="login.php" class="space-y-4 flex flex-col flex-grow">
      <div>
        <label for="email" class="sr-only">Correo electrónico</label>
        <input id="email" name="email" type="email" required
               class="w-full rounded-lg border border-gray-200 p-4 text-sm shadow-sm"
               placeholder="Ingresa tu correo electrónico"
               value="<?= htmlspecialchars($email) ?>">
      </div>
      <div>
        <label for="password" class="sr-only">Contraseña</label>
        <input id="password" name="password" type="password" required
               class="w-full rounded-lg border border-gray-200 p-4 text-sm shadow-sm"
               placeholder="Ingresa tu contraseña">
      </div>

      <div class="mt-auto flex flex-col gap-4">
        <p class="text-sm text-gray-500 text-center">
          ¿No tienes cuenta?
          <a href="/components/registro.php" class="text-indigo-600 underline">Regístrate aquí</a>
        </p>

        <button type="submit"
                class="w-full block text-center border rounded-lg bg-black px-5 py-3 text-sm font-medium text-white hover:bg-gray-800 transition">
          Iniciar Sesión
        </button>
      </div>
    </form>
  </div>
</section>

<?php include("footer.php"); ?>

</body>
</html>
