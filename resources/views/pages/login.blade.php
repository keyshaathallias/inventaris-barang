<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
</head>

<body>
  <div class="flex items-center justify-center min-h-screen bg-light font-poppins">
    <div class="flex flex-wrap w-full max-w-screen-lg overflow-hidden bg-white shadow-lg rounded-xl">
      <div class="flex items-center justify-center w-full p-10 bg-secondary lg:w-1/2">
        <img src="/img/Login-cuate.svg" alt="Login Illustration" class="max-w-full">
      </div>
      <div class="w-full p-8 lg:w-1/2">
        <form action="{{ route('login.login') }}" method="post" class="flex flex-col gap-4">
          @csrf
          <div class="flex flex-wrap mt-16 mb-5 text-sm breadcrumb text-gray">
            <a href="{{ route('landing') }}" class="text-primary hover:text-dark">Home</a>
            <p class="mx-2">/</p>
            <a href="#">Login</a>
          </div>
          <div class="heading">
            <h1 class="text-3xl font-semibold text-dark">Login</h1>
            <p class="pt-1 text-xs text-gray">Login to your account.</p>
          </div>
          <div class="relative h-[40px]">
            <input type="email" name="email" id="email" class="w-full py-2 my-3 rounded-xl pe-5 ps-5 bg-light"
              placeholder="Email">
          </div>
          @error('email')
            <small class="text-red-500">{{ $message }}</small>
          @enderror
          <div class="relative h-[40px]">
            <input type="password" name="password" id="password" class="w-full py-2 my-3 rounded-xl pe-5 ps-5 bg-light"
              placeholder="Password">
          </div>
          @error('password')
            <small class="text-red-500">{{ $message }}</small>
          @enderror

          <div class="flex flex-col gap-3 mt-5 text-center">
            <button type="submit"
              class="w-full px-5 py-2 my-3 font-medium text-white transition duration-200 ease-in-out hover:shadow-lg rounded-xl bg-primary hover:bg-secondary hover:text-primary">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @if ($message = Session::get('success'))
    <script>
      Swal.fire('{{ $message }}');
    </script>
  @endif
  @if ($message = Session::get('failed'))
    <script>
      Swal.fire('{{ $message }}');
    </script>
  @endif

  <footer class="w-full py-4 text-sm text-center bg-light text-gray">
    COPYRIGHT © 2024 | Keysha Athallia S.
  </footer>
</body>
@include('sweetalert::alert')

</html>
