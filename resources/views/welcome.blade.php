<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Trang chủ</title>
</head>

<body>
  <div>
    @include('layouts.header')
    <main class="min-h-screen px-[50px] py-9 bg-[#fffefc]">
      <section class="mb-9 text-[#776449BF]">
        <div class="flex justify-center">
          <div class="w-[780px] h-[130px] text-center">
            <h1 class="flex justify-center text-3xl font-medium">Chào mừng bạn đến với thế giới của chúng tôi</h1>
            <h3 class="mt-6">Hãy lựa chọn những sản phẩm bạn thích , trải nghiệm nó và bạn sẽ là một phần của chúng tôi . Chúng tôi luôn tự tin cung cấp những sản phẩm tốt và chất lượng nhất đến với người dùng.</h3>
            <h3>We love you. &#x2764 </h3>
          </div>
        </div>
      </section>
      <section class="mb-5">
        <img src="//13demarzo.net/cdn/shop/files/444-06.jpg?v=1694746947&amp;width=1500" srcset="//13demarzo.net/cdn/shop/files/444-06.jpg?v=1694746947&amp;width=375 375w, //13demarzo.net/cdn/shop/files/444-06.jpg?v=1694746947&amp;width=550 550w, //13demarzo.net/cdn/shop/files/444-06.jpg?v=1694746947&amp;width=750 750w, //13demarzo.net/cdn/shop/files/444-06.jpg?v=1694746947&amp;width=1100 1100w, //13demarzo.net/cdn/shop/files/444-06.jpg?v=1694746947&amp;width=1500 1500w" width="3624" height="2408.0" loading="lazy" sizes="100vw">
      </section>
      <section>
        <h1 class="flex justify-start mb-3 text-4xl text-[#796449BF]">Sản phẩm bán chạy</h1>
        <div class="flex flex-wrap gap-x-2 gap-y-2 text-[#796449BF]">
          @foreach($products as $product)
          @if($product->quantity < 20) <a class="cursor-pointer h-[410px] w-[329px]" href="{{route('product.show',['processedName'=>$product->processedName])}}">
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
            @endif
            @endforeach
        </div>
      </section>
      <section>
        <h1 class="flex justify-start mb-3 text-4xl text-[#796449BF]">Sản phẩm mới</h1>
        <div class="flex flex-wrap gap-x-2 gap-y-2 text-[#796449BF]">
          @foreach($newProducts as $product)
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
        </div>
      </section>
    </main>
    @include('layouts.footer')
  </div>
</body>

</html>