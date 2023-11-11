<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @vite('resources/css/components/radioButton.css')
</head>

<body>
  <div>
    @include('layouts.header')
    <main>
      <section>
        <section class="pb-[12px] pt-[36px] px-[50px] relative">
          <div class="flex">
            <ul class="flex flex-wrap gap-x-2 gap-y-2">
              @foreach (json_decode($product->productImage) as $key => $image)
              <li class="border {{$key == '0' ? 'w-full' : 'w-[calc((100%/2)-4px)]'}}" key={{$key}}>
                <div><img src="{{$image}}"></div>
              </li>
              @endforeach
            </ul>
            <div class="pl-[40px] relative">
              <div class="sticky top-6">
                <p class="text-[12px]">13DE MARZO</p>
                <div class="w-[415px]">
                  <h1 class="hover-color leading-[48px] text-[40px]">{{$product->name}}</h1>
                </div>
                <div class="my-4">
                  <span class="hover-color text-[18px]">{{number_format($product->price, 2, ',', '.')}} VND</span>
                </div>
                @if(!is_null($product->colors))
                <div class="mb-4 text-[12px]">
                  Tax included.
                </div>
                <div class="mb-4">
                  <div class="mb-[10px] text-[13px]">Color</div>
                  @foreach (json_decode($product->colors) as $color)
                  <input type="radio" name="colors" id="{{$color}}" {{$loop->first ? 'checked' : '' }} />
                  <label class="mr-[4px] rounded-full" for="{{$color}}">{{$color}}</label>
                  @endforeach
                </div>
                @endif
                <div class="mb-[10px]">
                  <div class="mb-[10px] text-[13px]">Size</div>
                  @if(!is_null($product->sizes))
                  @foreach (json_decode($product->sizes) as $size)
                  <input type="radio" name="sizes" id="{{$size}}" {{$loop->first ? 'checked' : '' }} />
                  <label class="mr-[4px] rounded-full" for="{{$size}}">{{$size}}</label>
                  @endforeach
                  @endif
                </div>
                <div class="mb-7">
                  <span class="text-[13px]">Quantity</span>
                  <livewire:counter />
                </div>
                <div class=" border border-[#796449BF] cursor-pointer duration-250 ease-in-out flex h-[45px] hover-color hover:border-[1.7px] hover:border-[rgb(121,100,73)] justify-center mb-2 rounded-xl transition">
                  <button type="submit">Add to cart</button>
                </div>
                <div class="bg-[#F3D9A8] border duration-250 ease-in-out flex h-[48px] hover:scale-[1.009] justify-center rounded-xl text-black transition">
                  <button><a class="bg-[#F3D9A8]">Buy it now</a></button>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div>
          <div class="py-[36px] px-[50px]">
            <ul class="flex gap-x-2">
              <li class="px-4 pb-6">
                <h3 class="text-xl">About Shipping</h3>
                <div class="mt-3">
                  <p>We will charge you for delivery fee. It is based on which area do you live in and we follow multiple express company such as Fedex , DHL etc.. your order will be delivered in a proper way.</p>
                </div>
              </li>
              <li class="px-4 pb-6">
                <h3 class="text-xl">Refund or Exchange</h3>
                <div class="mt-3">
                  <p>We will make the refund after you have return the porduct,the delivery fee should charged by yourself. If there is no quality problem , we suggest you contact our CustomerCare Team in advance.</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </section>
    </main>
    @include('layouts.footer')
  </div>
</body>

</html>