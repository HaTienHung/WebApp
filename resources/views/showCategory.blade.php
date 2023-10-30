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
    <main class="min-h-screen px-[50px] py-9">
      <h1 class="flex justify-start mb-3 text-4xl text-[#796449BF]">Bộ sưu tập</h1>
      <div class="flex flex-wrap gap-y-2 gap-x-2 text-[#796449BF]">
        @foreach($products as $product)
        <a class="cursor-pointer h-[410px] w-[329px]" href="{{route('product.show',['processedName'=>$product->processedName])}}">
          <div class="[&>img]:hover:scale-[1.03] hover:underline text-sm underline-offset-2">
            @foreach (json_decode($product->productImage) as $key => $image)
            @if($key==0)
            <img class="duration-500 ease-in-out transition" src="{{$image}}" alt="{{$product->name}}" />
            @endif
            @endforeach
          </div>
          <div class="py-[17px]">
            <div class="hover:underline text-[14px] underline-offset-2">{{$product->name}}</div>
            <div class="text-[20px]">{{number_format($product->price, 2, ',', '.')}} VND</div>
          </div>
        </a>
        @endforeach
      </div>
    </main>
    @include('layouts.footer')
  </div>
</body>

</html>