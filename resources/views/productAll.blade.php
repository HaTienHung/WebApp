<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <!-- Bootstrap JS và Popper.js (được yêu cầu bởi Bootstrap) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div>
    @include('layouts.header')
    <main class="min-h-screen px-[50px] py-9 bg-[#fffefc]">
      <section class="mb-9 text-[#776449BF]">
        <h1 class="flex justify-start mb-3 text-4xl text-[#796449BF]">Tất cả sản phẩm</h1>
        <div class="flex flex-wrap gap-x-2 gap-y-2 text-[#796449BF]">
          @foreach($products as $product)
          <a class="cursor-pointer h-[410px] w-[329px]" href="{{route('product.show',['processedName'=>$product->processedName])}}">
            <div class="[&>div>span]:hover:underline [&>img]:hover:scale-[1.03] text-sm underline-offset-2">
              @foreach (json_decode($product->productImage) as $key => $image)
              @if($key==0)
              <img class="duration-500 ease-in-out transition" src="{{$image}}" alt="{{$product->name}}" />
              @endif
              @endforeach
              <div class="py-[17px] text-[#776449]">
                <span class="text-sm font-thin">{{$product->name}}</span>
                <div class="text-[18px] mt-2">{{number_format($product->price, 2, ',', '.')}} VND</div>
              </div>
            </div>
          </a>
          @endforeach
          <div class="flex justify-between w-full">
            @if ($products->currentPage() > 1)
            <a href="{{ $products->previousPageUrl() }}" class="cursor-pointer hover:underline underline-offset-2">Trang trước</a>
            @endif
            @if ($products->currentPage() < $products->lastPage())
              <a href="{{ $products->nextPageUrl() }}" class="cursor-pointer hover:underline underline-offset-2">Trang tiếp theo</a>
              @endif
          </div>
        </div>
      </section>
    </main>
    @include('layouts.footer')
  </div>
</body>

</html>