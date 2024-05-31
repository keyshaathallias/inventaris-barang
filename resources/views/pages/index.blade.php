<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
</head>

<body class="font-poppins">
  <header class="relative w-full py-8 lg:pt-6 lg:pb-1">
    <div class="container absolute flex items-center justify-between pt-2 mx-auto px-[95px]">
      <div class="flex items-center">
        <i class="pr-2 text-2xl bi bi-box-seam-fill text-primary"></i>
        <p class="text-lg font-bold text-primary">Ogah Rugi</p>
      </div>
    </div>
  </header>

  <section id="home" class="px-[75px] self-center">
    <div class="container">
      <div class="flex flex-wrap content-center">
        <div class="self-center w-full px-4 py-5 mt-10 lg:w-1/2">
          <h5 class="p-2 text-sm font-semibold rounded-[5px] bg-light text-primary w-fit">Welcome to PT. Ogah Rugi 👋
          </h5>
          <h1 class="text-[64px] font-bold w-[657px] text-primary leading-[80px] mt-[20px]">Easily manage your inventory
            items</h1>
          <p class="text-gray text-base w-[638px] mt-[20px] mb-[30px]">
            Streamline your inventory management with PT. Ogah Rugi's intuitive system. Keep track of purchases, usage,
            and stock levels with ease, ensuring your operations run smoothly and efficiently.
          </p>
          <a href="{{ route('login') }}"
            class="text-base font-medium rounded-xl py-[10px] px-[35px] bg-secondary text-primary drop-shadow-md hover:bg-primary hover:shadow-lg hover:text-secondary transition duration-200 ease-in-out">Login</a>
        </div>

        <div class="self-end w-full px-10 lg:w-1/2">
          <div class="relative">
            <div class="absolute box-content ms-[109px] h-700 w-523 bg-secondary -z-10 rounded-3xl">
              <img src="/img/Star.svg" alt="Star" class="pr-[185px] pb-[350px] rounded-3xl">
            </div>
            <img src="/img/Illustration.svg" alt="Illustration" class="max-w-full mx-auto pt-28 ms-10">
          </div>
        </div>
      </div>
    </div>
  </section>
  @include('sweetalert::alert')
</body>

</html>
