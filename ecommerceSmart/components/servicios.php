<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SmartDrink - Servicios</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-white">

  <!-- Navbar -->
<?php include("navbar.php"); ?>

  <!-- Pricing Section - included -->
<?php include("pricing.php"); ?>

  <!-- Tabla de comparación -->
  <section class="max-w-[1200px] mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-6 text-center">Comparativa de Planes</h2>
    <table class="w-full text-left border-collapse border border-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th class="border border-gray-300 p-3">Características</th>
          <th class="border border-gray-300 p-3">Básico</th>
          <th class="border border-gray-300 p-3">Pro</th>
          <th class="border border-gray-300 p-3">Premium</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border border-gray-300">
          <td class="border border-gray-300 p-3">Acceso a todas las bebidas</td>
          <td class="border border-gray-300 p-3 text-center">✔️</td>
          <td class="border border-gray-300 p-3 text-center">✔️</td>
          <td class="border border-gray-300 p-3 text-center">✔️</td>
        </tr>
        <tr class="border border-gray-300 bg-gray-50">
          <td class="border border-gray-300 p-3">Entrega rápida</td>
          <td class="border border-gray-300 p-3 text-center">❌</td>
          <td class="border border-gray-300 p-3 text-center">✔️</td>
          <td class="border border-gray-300 p-3 text-center">✔️</td>
        </tr>
        <tr class="border border-gray-300">
          <td class="border border-gray-300 p-3">Descuentos exclusivos</td>
          <td class="border border-gray-300 p-3 text-center">❌</td>
          <td class="border border-gray-300 p-3 text-center">❌</td>
          <td class="border border-gray-300 p-3 text-center">✔️</td>
        </tr>
        <tr class="border border-gray-300 bg-gray-50">
          <td class="border border-gray-300 p-3">Soporte prioritario</td>
          <td class="border border-gray-300 p-3 text-center">❌</td>
          <td class="border border-gray-300 p-3 text-center">✔️</td>
          <td class="border border-gray-300 p-3 text-center">✔️</td>
        </tr>
      </tbody>
    </table>
  </section>

  <?php include("donwloadQR.php"); ?>
  <?php include("footer.php"); ?>

</body>
</html>
