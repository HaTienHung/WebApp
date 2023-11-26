<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @vite('resources/css/components/radioButton.css')
  <title>{{$product->name}}</title>
</head>

<body>
  <div>
    @include('layouts.header')
    <main>
      <section class="bg-[#fffefc] text-[#796449BF]">
        <section class="pb-[12px] pt-[36px] px-[50px] relative">
          <div>
            @if(session()->has('success'))
            <div>
              toastr()->success();
              toastr()->error();
            </div>
            @endif
          </div>
          <form action="{{ route('add.to.cart') }}" method="post" id="yourFormId">
            @csrf
            <div class="flex">
              <ul class="flex flex-wrap gap-x-2 gap-y-2">
                @foreach (json_decode($product->productImage) as $key => $image)
                <li class="border {{$key == '0' ? 'w-full' : 'w-[calc((100%/2)-4px)]'}}" key={{$key}}>
                  <div>
                    <img src="{{$image}}">
                    @if($key == '0')
                    <input class="hidden" name="first_image" value="{{$image}}">
                    @endif
                  </div>
                </li>
                @endforeach
              </ul>
              <div class="pl-[40px] relative">
                <div class="sticky top-6">
                  <p class="text-[12px]">13DE MARZO</p>
                  <div class="w-[415px]">
                    <input type="text" value="{{$product->name}}" name="product_name" class="hidden" />
                    <h1 class="hover-color leading-[48px] text-[40px]">{{$product->name}}</h1>
                  </div>
                  <input type="hidden" value="{{$product->id}}" name="product_id" />
                  <div class="my-4">
                    <input class="hidden" value="{{number_format($product->price, 2, ',', '.')}}" name="product_price" />
                    <span class="hover-color text-[18px]">{{number_format($product->price, 2, ',', '.')}} VND</span>
                  </div>
                  @if(!is_null($product->colors))
                  <div class="mb-4 text-[12px]">
                    Đã bao gồm thuế.
                  </div>
                  <div class="mb-4">
                    <div class="mb-[10px] text-[13px]">Màu sắc</div>
                    @foreach (json_decode($product->colors) as $color)
                    <input value="{{$color}}" type="radio" name="product_color" id="{{$color}}" {{$loop->first ? 'checked' : '' }} />
                    <label class="mr-[4px] rounded-full" for="{{$color}}">{{$color}}</label>
                    @endforeach
                  </div>
                  @endif
                  <div class="mb-[10px]">
                    @if(!is_null($product->sizes))
                    <div class="mb-[10px] text-[13px]">Kích thước</div>
                    @foreach (json_decode($product->sizes) as $size)
                    <input value="{{$size}}" type="radio" name="product_size" id="{{$size}}" {{$loop->first ? 'checked' : '' }} />
                    <label class="mr-[4px] rounded-full" for="{{$size}}">{{$size}}</label>
                    @endforeach
                    @endif
                  </div>
                  <div class="mb-7">
                    <span class="text-[13px]">Số lượng</span>
                    <div class="border border-[#796449BF] cursor-pointer flex h-[47px] items-center justify-between mt-[6px] px-3 py-3 w-[142px]">
                      <button id="decreaseQuantity" class="cursor-pointer text-[16px]" type="button">-</button>
                      <input id="product_quantity" type="hidden" value="1" name="product_quantity">
                      <span id="displayQuantity">1</span>
                      <button id="increaseQuantity" class="cursor-pointer text-[16px]" type="button">+</button>
                    </div>
                  </div>
                  <div class=" border border-[#796449BF] cursor-pointer duration-250 ease-in-out flex h-[45px] hover-color hover:border-[1.7px] hover:border-[rgb(121,100,73)] justify-center mb-2 rounded-xl transition">
                    <button type="submit" class="w-full">Thêm vào giỏ hàng</button>
                  </div>
                  <div class="bg-[#F3D9A8] border duration-250 ease-in-out flex h-[48px] hover:scale-[1.009] justify-center rounded-xl text-black transition">
                    <button><a href="{{route('checkout.index')}}" class="bg-[#F3D9A8]">Mua ngay</a></button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </section>
        <section>
          <div>
            <div class="py-[36px] px-[50px]">
              <ul class="flex gap-x-2">
                <li class="px-4 pb-6">
                  <h3 class="text-xl">Vận chuyển</h3>
                  <div class="mt-3">
                    <p>Chúng tôi sẽ tính phí giao hàng cho bạn. Nó dựa trên khu vực bạn sống và chúng tôi theo dõi nhiều công ty chuyển phát nhanh như FedEx, DHL, v.v.. đơn hàng của bạn sẽ được giao một cách thích hợp.</p>
                  </div>
                </li>
                <li class="px-4 pb-6">
                  <h3 class="text-xl">Hoàn tiền hoặc trao đổi</h3>
                  <div class="mt-3">
                    <p>Chúng tôi sẽ hoàn lại tiền sau khi bạn trả lại sản phẩm, phí giao hàng sẽ do bạn tự tính. Nếu không có vấn đề về chất lượng, chúng tôi khuyên bạn nên liên hệ trước với Nhóm chăm sóc khách hàng của chúng tôi.</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </section>
      </section>
    </main>
    @include('layouts.footer')
  </div>
  <script>
    // Các sự kiện khi tăng/giảm số lượng
    document.getElementById('increaseQuantity').addEventListener('click', function() {
      updateQuantity(1);
    });

    document.getElementById('decreaseQuantity').addEventListener('click', function() {
      updateQuantity(-1);
    });

    function updateQuantity(change) {
      var quantityInput = document.getElementById('product_quantity');
      var displayQuantity = document.getElementById('displayQuantity');
      var currentQuantity = parseInt(quantityInput.value);

      if (currentQuantity + change > 0) {
        quantityInput.value = currentQuantity + change;
        displayQuantity.innerText = quantityInput.value;
      }
    }
  </script>
</body>

</html>