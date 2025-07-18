<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Navbar -->
<header class="py-4 bg-white relative z-50">
  <div class="flex items-center justify-between px-4 max-w-[1200px] mx-auto">

    <!-- Menu desktop -->
    <ul id="menu-desktop" class="gap-4 hidden text-lg lg:flex">
      <li><a href="../index.php" class="hover:text-gray-700">Inicio</a></li>
      <li><a href="/components/servicios.php" class="hover:text-gray-700">Servicios</a></li>
      <li><a href="/components/catalogo.php" class="hover:text-gray-700">Productos</a></li>
      <li><a href="/components/nosotros.php" class="hover:text-gray-700">Nosotros</a></li>
    </ul>

    <!-- Logo -->
    <a href="../index.php">
      <img src="/public/Logo.png" class="hidden h-14 lg:block" alt="Logo" />
      <img src="/public/Logo-mobile.png" class="h-14 lg:hidden" alt="Logo" />
    </a>

    <!-- Right side -->
    <div class="flex items-center gap-4">

      <!-- Search desktop -->
      <div class="hidden items-center lg:flex">
        <label for="simple-search" class="sr-only">Buscar</label>
        <div class="relative w-full">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" /></svg>
          </div>
          <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Buscar" />
        </div>
        <button class="p-2.5 ml-2 text-sm font-medium text-white bg-black rounded-lg border hover:scale-105 transition-transform">
          <svg class="w-5 h-5" fill="none" stroke="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
          <span class="sr-only">Search</span>
        </button>
      </div>

      <!-- Cart icon -->
      <a href="/components/cart.php" class="relative inline-flex items-center py-2.5 text-sm font-medium text-center hover:text-gray-700 transition">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
          <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
        </svg>
        <span class="sr-only">Cart</span>
      </a>

      <!-- Profile or Avatar -->
      <?php if (isset($_SESSION['usuario'])): ?>
        <div class="relative inline-block text-left">
          <button id="user-menu-button" aria-expanded="false" aria-haspopup="true" class="flex items-center gap-2 focus:outline-none">
            <!-- Simple avatar circle with initials -->
            <div class="w-8 h-8 rounded-full bg-gray-800 text-white flex items-center justify-center font-semibold uppercase">
              <?= htmlspecialchars(substr($_SESSION['usuario'], 0, 1)) ?>
            </div>
            <span class="hidden sm:inline"><?= htmlspecialchars($_SESSION['usuario']) ?></span>
            <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <!-- Dropdown menu -->
          <div id="user-dropdown" class="hidden origin-top-right absolute right-0 mt-2 w-36 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
            <div class="py-1">
              <a href="/components/perfil.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Perfil</a>
              <form action="/components/logout.php" method="POST">
                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cerrar sesión</button>
              </form>
            </div>
          </div>
        </div>
      <?php else: ?>
        <a href="/components/login.php" class="relative inline-flex items-center py-2.5 text-sm font-medium text-center hover:text-gray-700 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <span class="sr-only">Profile</span>
        </a>
      <?php endif; ?>

      <!-- Mobile menu button -->
      <button id="menu-btn" class="block lg:hidden focus:outline-none ml-2" aria-label="Toggle menu">
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
  </div>

  <!-- Mobile menu (hidden by default) -->
  <div id="mobile-menu" class="hidden bg-white px-4 pt-2 pb-4 lg:hidden">
    <ul class="space-y-4 text-lg">
      <li><a href="../index.php" class="block hover:text-gray-700">Inicio</a></li>
      <li><a href="/components/servicios.php" class="block hover:text-gray-700">Servicios</a></li>
      <li><a href="/components/catalogo.php" class="block hover:text-gray-700">Productos</a></li>
      <li><a href="/components/nosotros.php" class="block hover:text-gray-700">Nosotros</a></li>
    </ul>
  </div>
</header>

<script src="/js/navbar.js"></script>
