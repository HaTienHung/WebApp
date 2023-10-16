<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body>
  <div>
    @include('layouts.header')
    <main class="px-[50px] py-9 min-h-screen">
      <h1 class="text-4xl flex justify-start text-[#796449BF]">For Sales</h1>
      <div class="flex justify-between text-[#796449BF]">
        <a class="w-[329px] h-[410px] cursor-pointer">
          <div class="hover:underline underline-offset-2 text-sm [&>img]:hover:scale-[1.03]">
            <img class="transition duration-500 ease-in-out" src="https://13demarzo.net/cdn/shop/files/8_.25-02858.jpg?v=1694138281&width=720">
            13DE MARZO Kuromi Bear Short Line Shirt
          </div>
          <div class="text-[20px]">9.999.999,62 VND</div>
        </a>
      </div>
    </main>
    @include('layouts.footer')
  </div>
</body>

</html>