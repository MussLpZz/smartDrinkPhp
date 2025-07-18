<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SmartDrink - Nosotros</title>
  
  <!-- TailwindCSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

  <!-- Navbar -->
  <?php include("navbar.php"); ?>

  <!-- Sección: ¿Quiénes somos? -->
  <section class="grid grid-cols-1 md:grid-cols-2 gap-0 bg-opacity-25">
    <div class="flex flex-col items-start bg-black justify-center px-4 py-24 lg:px-20">
      <span class="mb-4 p-2 px-4 rounded-xl bg-white text-black font-semibold">SmartDrink</span>
      <h1 class="mb-6 text-4xl font-bold leading-tight text-white md:text-4xl lg:text-5xl">¿Quiénes somos?</h1>
      <p class="mb-4 text-lg text-white text-justify tracking-relaxed lg:pr-16">
        Somos un equipo de jóvenes desarrolladores que ofrecemos productos inteligentes a su disposición para mejorar el entorno en donde se encuentren. Buscamos facilitar y agilizar la preparación de bebidas con métodos tecnológicos, ya que nuestro principal objetivo es lograr que nuestros clientes se posicionen entre los mejores, siendo distintos y destacando entre los demás.
      </p>
    </div>
    <div>
      <img src="https://s1.1zoom.me/big0/126/Drinks_Strawberry_Cocktail_Black_background_548048_1280x893.jpg"
           alt="Bebida con fresa"
           class="object-cover w-full h-64 md:h-full" loading="lazy" />
    </div>
  </section>

  <!-- Sección: Misión y Visión -->
  <section class="grid grid-cols-1 md:grid-cols-2 gap-0 bg-opacity-25">
    <div class="order-2 md:order-1">
      <img src="https://static7.depositphotos.com/1000589/717/i/600/depositphotos_7172080-stock-photo-mojito-cocktail-on-white-background.jpg"
           alt="Mojito"
           class="object-cover w-full h-64 md:h-full" loading="lazy" />
    </div>
    <div class="flex flex-col items-start justify-center px-4 py-24 lg:px-20 order-1 md:order-2">
      <h2 class="mb-6 text-4xl font-bold leading-tight text-black md:text-4xl lg:text-5xl">Misión</h2>
      <p class="mb-4 text-lg text-black text-justify tracking-relaxed lg:pr-24">
        Proporcionar a nuestros clientes los mejores productos inteligentes y herramientas necesarias para cambiar y mejorar su experiencia en la preparación de bebidas. Nos esforzamos para superar las expectativas de nuestros clientes.
      </p>
      <h2 class="mb-6 text-4xl font-bold leading-tight text-black md:text-4xl lg:text-5xl pt-10">Visión</h2>
      <p class="mb-4 text-lg text-black text-justify tracking-relaxed lg:pr-24">
        Ser reconocidos a nivel nacional e internacional siendo diferentes a los demás, ofreciendo la mejor calidad posible en nuestros servicios y productos de excelencia.
      </p>
    </div>
  </section>

  <?php include("equipo.php"); ?>
  <?php include("contacto.php"); ?>

</body>
</html>
