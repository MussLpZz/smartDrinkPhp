<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="SmartDrink - Productos inteligentes y servicios de instalación gratis.">
  <title>SmartDrink</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">

<?php include("components/navbar.php"); ?>

<!-- Cambiando la Manera -->
<div class="relative overflow-hidden bg-white">
    <div class="pb-80 pt-16 sm:pb-40 sm:pt-24 lg:pb-48 lg:pt-40">
        <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
            <div class="sm:max-w-lg">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                    Cambiando la manera de preparar bebidas.
                </h1>
                <p class="mt-6 text-xl text-gray-500 text-justify">
                    Comprometidos con la innovación, creatividad y servicio para que puedas brindar
                    la mejor experiencia a tus clientes con un estilo original. <br/><br/>Con nuestra app móvil tu clientes podrán pedir su bebida preferida, personalizarla y pagarla desde su celular .
                </p>
            </div>
            <div>
                <div class="mt-10">
                    <div aria-hidden="true" class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
                        <div class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
                            <div class="flex items-center space-x-6 lg:space-x-8">
                                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                    <div class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                                        <img src="https://www.cocteleria.com.mx/2017/wp-content/uploads/2018/01/coctel.png" alt="" class="h-full object-cover object-center rotate-12" />
                                    </div>
                                    <div class="h-64 w-44 overflow-hidden rounded-lg">
                                        <img src="https://asianbistro.mx/upload/platillos/bebidas/ancho-maracuya.png" alt="" class="h-full w-full object-cover object-center -rotate-12" />
                                    </div>
                                </div>
                                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                    <div class="h-64 w-44 overflow-hidden rounded-lg">
                                        <img src="https://style.shockvisual.net/wp-content/uploads/2021/05/mezcal.png" alt="" class="h-full w-full object-cover object-center" />
                                    </div>
                                    <div class="h-64 w-44 overflow-hidden rounded-lg">
                                        <img src="https://www.alcossebrehotel.com/wp-content/uploads/2022/03/tropical.png" alt="" class="h-full w-full object-cover object-center" />
                                    </div>
                                    <div class="h-64 w-44 overflow-hidden rounded-lg">
                                        <img src="https://i.pinimg.com/originals/b9/db/1a/b9db1ae0c2df52def3e0e029fd9d9da3.png" alt="" class="h-full w-full object-cover object-center" />
                                    </div>
                                </div>
                                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                    <div class="h-64 w-44 overflow-hidden rounded-lg">
                                        <img src="https://i.pinimg.com/originals/f0/82/c1/f082c1fd98314d3054c9345f3d34a593.png" alt="" class="h-full w-full object-cover object-center" />
                                    </div>
                                    <div class="h-64 w-44 overflow-hidden rounded-lg">
                                        <img src="https://asianbistro.mx/upload/platillos/bebidas/mezcal-jamaica.png" alt="" class="h-full w-full object-cover object-center -rotate-12" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/components/servicios.php" class="inline-block rounded-md border border-transparent bg-black px-8 py-3 text-center font-medium text-white hover:bg-white hover:text-black hover:border-black">Conocer servicios</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pricing -->
<?php include("components/pricing.php"); ?>

<!-- Promo Productos -->
<div class="mt-20 flex flex-col md:flex-row md:gap-10 bg-black rounded-xl w-11/12 m-auto p-5 justify-center">
  <div class="rounded-xl p-6 flex flex-col justify-center items-center">
    <h1 class="text-white text-3xl md:text-6xl font-semibold text-center">Productos</h1>
    <p class="text-white text-xl font-sans mt-8 text-justify md:text-3xl w-60 md:w-auto lg:w-auto md:pl-10">Los mejores productos inteligentes para cambiar el ambiente donde te ubiques, encuentra los mejores precios solo en SmartDrink! Y disfruta de cada uno de ellos.</p>
    <a href="/components/catalogo.php" class="w-40 mt-20 items-center block px-10 text-sm py-3.5 md:text-2xl md:w-80 font-semibold text-center text-white bg-black transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl hover:bg-white hover:border-black hover:text-black">Comprar ahora</a>
  </div>
  <div class="flex justify-center items-center">
    <a href="/components/catalogo.php"><img class="rounded-2xl w-40 md:w-auto" src="/public/carrito.png" alt="Carrito de compras" /></a>
  </div>
</div>

<!-- Promo Servicio -->
<div class="p-4 md:p-8 max-w-[1300px] mx-auto">
    <div class="bg-white rounded-[2rem] md:rounded-[4rem] p-8 sm:flex sm:items-center md:p-12 sm:justify-center justify-items-center">
      <div class="flex flex-col md:flex-row justify-center items-center">
        <div class="flex flex-col items-center">
          <h1 class="text-black text-2xl mb-3 md:text-3xl lg:text-4xl md:mb-8 font-semibold text-center">Promoción servicio de instalación</h1>
          <a href="/components/catalogo.php"><img src="/public/promo2025.gif" alt="Promoción instalación gratis" /></a>
        </div>
        <div class="flex flex-col">
          <p class="text-black mb-6 text-xl w-60 text-justify lg:text-2xl lg:w-auto md:w-auto md:mb-10">A partir de $1500 MXN en compra el servicio de instalación es <span class='text-red-600 font-bold'>GRATIS!</span> No te pierdas de esta gran promoción!</p>
          <a href="/components/catalogo.php" class="w-80 items-center block px-10 py-3.5 text-base font-medium text-center text-white bg-black transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl hover:bg-white hover:border-black hover:text-black">Comprar ahora</a>
        </div>
      </div>
    </div>
  </div>

<!-- Nuestro equipo -->
<?php include("components/equipo.php"); ?>

<!-- Diferenciador -->
<?php include("components/diferenciador.php"); ?>

<!-- Footer -->
<?php include("components/footer.php"); ?>

</body>
</html>
