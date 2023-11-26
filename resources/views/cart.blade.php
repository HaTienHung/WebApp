<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Giỏ hàng</title>
</head>

<body>
  <div>
    @include('layouts.header')
    <main class="min-h-screen px-[50px] py-9 bg-[#fffefc]">
      <section class="mb-9 text-[#776449BF]">
        <div>
          @if(session()->has('success'))
          <div>
            toastr()->success();
          </div>
          @endif
        </div>
        @if(empty($cart))
        <div class="flex justify-center mt-10">
          <p class="text-4xl">Giỏ hàng trống.</p>
        </div>
        <div class="flex justify-center mt-8">
          <div class="bg-[#F3D9A8] border duration-250 ease-in-out flex h-[48px] hover:scale-[1.009] justify-center rounded-xl text-black transition w-[200px]">
            <button>
              <a class="bg-[#F3D9A8] w-full cursor-pointer px-6" href="{{route('show.allProduct')}}">Tiếp tục mua sắm</a>
            </button>
          </div>
        </div>
        @else
        <div class="flex justify-between items-center">
          <h1 class="text-4xl mt-[4rem] mb-[3rem]">Giỏ hàng của bạn</h1>
          <a class="text-[#776449BF] underline underline-offset-2" href="{{route('show.allProduct')}}">Tiếp tục mua sắm</a>
        </div>
        <div class="pb-10 border-b">
          <table class="w-full">
            <thead>
              <tr class="text-sm">
                <th colspan="2" align="start" class="pb-4">Sản phẩm</th>
                <th colspan="1" align="start" class="pb-4 pl-[60px]">Số lượng</th>
                <th colspan="1" align="end" class="pb-4 pl-[40px]">Tổng tiền</th>
              </tr>
            </thead>
            <tbody class="border-t">
              @foreach($cart as $item)
              <tr class="quantity-container align-top" data-product-id="{{$item['id']}}">
                <td class="pt-10 w-[134px] h-[181px]">
                  <div class="border">
                    <img src="{{$item['image']}}">
                  </div>
                </td>
                <td class="pt-10 pl-10">
                  <div class="flex w-[500px]">
                    <div class="w-[320px] flex-wrap font-thin">
                      <a class="cursor-pointer hover:underline underline-offset-2 text-base text-[#776449] mb-4" href="{{route('product.show',['processedName'=>str_replace(' ', '-', $item['name'])])}}">
                        {{$item['name']}}
                      </a>
                      <div class="mt-[4px] text-[14px]">
                        <span>
                          {{$item['price']}} VND
                        </span>
                      </div>
                      @if($item['color'] != null)
                      <div class="mt-[4px] text-[14px]">
                        <span>
                          Màu sắc: {{$item['color']}}
                        </span>
                      </div>
                      @endif
                      @if($item['size'] != null)
                      <div class="mt-[4px] text-[14px]">
                        <span>
                          Kích thước: {{$item['size']}}
                        </span>
                      </div>
                      @endif
                    </div>
                  </div>
                </td>
                <td class="pt-10 pl-[60px]">
                  <div class="self-start flex flex-wrap">
                    <div class="border border-[#796449BF] cursor-pointer flex h-[47px] items-center justify-between px-3 w-[142px] ">
                      <button class="decreaseQuantity cursor-pointer text-[16px]" type="button">-</button>
                      <input class="product_quantity" type="hidden" value="{{$item['quantity']}}" name="product_quantity">
                      <span class="displayQuantity">{{$item['quantity']}}</span>
                      <button class="increaseQuantity cursor-pointer text-[16px]" type="button">+</button>
                    </div>
                    <div class="flex items-center ml-6 justify-center cart-item" data-product-id="{{$item['id']}}">
                      <form action="{{ route('remove.from.cart', [
                          'productId' => $item['id'],
                          'productSize' => isset($item['size']) ? $item['size'] : 'defaultSize',
                          'productColor' => isset($item['color']) ? $item['color'] : 'defaultColor',
                           ]) }}" method="post" class="delete-form" data-product-id="{{ $item['id'] }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cursor pointer items-center px-1 py-1 deleteProduct" data-product-id="{{ $item['id'] }}">
                          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" viewBox="0,0,256,256" style="fill:#000000;">
                            <g fill-opacity="0.74902" fill="#796449" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                              <g transform="scale(10.66667,10.66667)">
                                <path d="M10,2l-1,1h-5v2h1v15c0,0.52222 0.19133,1.05461 0.56836,1.43164c0.37703,0.37703 0.90942,0.56836 1.43164,0.56836h10c0.52222,0 1.05461,-0.19133 1.43164,-0.56836c0.37703,-0.37703 0.56836,-0.90942 0.56836,-1.43164v-15h1v-2h-5l-1,-1zM7,5h10v15h-10zM9,7v11h2v-11zM13,7v11h2v-11z"></path>
                              </g>
                            </g>
                          </svg>
                        </button>
                      </form>
                    </div>
                  </div>
                </td>
                <td class="pt-10 pl-10">
                  <div class="flex justify-end pt-2 min-w-[180px]">
                    <div>
                      <input class="data-price" type="hidden" value="{{$item['price']}}" data-initial-price="{{$item['price']}}">
                      <h1 class="total text-base text-[#796449]"></h1>
                    </div>
                  </div>
                </td>
                <td class="subtotal"></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-10">
          <h1 colspan="4" class="text-right font-bold text-[#776449]">Tổng giá trị đơn hàng: <span class="order-total text-[#776449BF] text-lg" id="cartTotal">0 VND</span></h1>
        </div>
        <div class="flex justify-end mt-5">
          <div class="bg-[#F3D9A8] border duration-250 ease-in-out flex h-[48px] hover:scale-[1.009] justify-center rounded-xl text-black transition w-[380px]">
            <button><a class="bg-[#F3D9A8]" href="{{route('checkout.index')}}">Mua ngay</a></button>
          </div>
        </div>
        @endif
      </section>
    </main>
    @include('layouts.footer')
  </div>
  <script>
    //Mount to DOM
    document.querySelectorAll('.quantity-container').forEach(function(container) {
      var decreaseButton = container.querySelector('.decreaseQuantity');
      var increaseButton = container.querySelector('.increaseQuantity');
      var quantityInput = container.querySelector('.product_quantity');
      var displayQuantity = container.querySelector('.displayQuantity');
      var totalElement = container.querySelector('.total');
      var priceElement = container.querySelector('.data-price');
      var cartTotalElement = document.getElementById('cartTotal');
      // Show total price when product is mounted to DOM
      var price = parseFloat((priceElement.value).replace(/\./g, '').replace(',', '.'));

      var currentQuantity = parseInt(quantityInput.value);

      var total = price * currentQuantity;
      var allContainers = document.querySelectorAll('.quantity-container');
      var cartTotal = 0;

      totalElement.innerText = numberFormatJs(total, 2, ',', '.') + " VND";
      allContainers.forEach(function(container) {
        var total = container.querySelector('.total');
        var totalValue = parseFloat(total.innerText.replace(/\./g, '').replace(',', '.'));
        cartTotal += totalValue;
      });
      cartTotalElement.innerText = numberFormatJs(cartTotal, 2, ',', '.') + " VND";

      // Lấy giá trị từ Local Storage nếu có
      var productId = container.dataset.productId;
      var storedQuantity = localStorage.getItem('product_quantity_' + productId);
      var storedTotal = (localStorage.getItem('product_total_' + productId));
      var storedCartTotal = (localStorage.getItem('cartTotal'));

      console.log("productId: ", productId);
      console.log("storedQuantity: ", storedQuantity);
      console.log("storedTotal: ", storedTotal);
      console.log("storedCartTotal: ", storedCartTotal);

      if (storedQuantity !== null) {
        quantityInput.value = storedQuantity;
        displayQuantity.innerText = storedQuantity;
        priceElement.value = numberFormatJs(storedTotal, 2, ',', '.');
        totalElement.innerText = numberFormatJs(storedTotal, 2, ',', '.') + " VND";
        cartTotalElement.innerText = numberFormatJs(storedCartTotal, 2, ',', '.') + " VND";
      }

      decreaseButton.addEventListener('click', function() {
        updateQuantity(container, -1);
      });

      increaseButton.addEventListener('click', function() {
        updateQuantity(container, 1);
      });
    });
    //Delete data in local storage when remove item
    document.querySelectorAll('.delete-form').forEach(function(form) {
      form.addEventListener('submit', function(event) {
        event.preventDefault();

        var productId = form.querySelector('.deleteProduct').dataset.productId;
        var storedQuantity = localStorage.getItem('product_quantity_' + productId);
        var storedTotal = (localStorage.getItem('product_total_' + productId));

        // Xoá sản phẩm khỏi Local Storage
        localStorage.removeItem('product_quantity_' + productId);
        localStorage.removeItem('product_total_' + productId);

        // Submit form để thực hiện xóa trên server
        form.submit();
      });
    });

    function updateTotal(container) {
      var quantityInput = container.querySelector('.product_quantity');
      var totalElement = container.querySelector('.total');
      var priceElement = container.querySelector('.data-price');
      var price = parseFloat((priceElement.value).replace(/\./g, '').replace(',', '.'));

      var currentQuantity = parseInt(quantityInput.value);

      var total = price * currentQuantity;

      totalElement.innerText = numberFormatJs(total, 2, ',', '.') + " VND";
      calculateTotalCart();
    }

    //Update quantity 
    function updateQuantity(container, change) {
      var productId = container.dataset.productId;
      var quantityInput = container.querySelector('.product_quantity');
      var displayQuantity = container.querySelector('.displayQuantity');
      var totalElement = container.querySelector('.total');
      var priceElement = container.querySelector('.data-price');
      var initialPrice = parseFloat(priceElement.dataset.initialPrice.replace(/\./g, '').replace(',', '.'));
      var currentQuantity = parseInt(quantityInput.value);
      if (currentQuantity + change > 0) {
        var newQuantity = currentQuantity + change;
        var newTotal = (newQuantity * initialPrice).toFixed(2);
        quantityInput.value = newQuantity;
        displayQuantity.innerText = newQuantity;
        priceElement.value = newTotal;
        totalElement.innerText = numberFormatJs(newTotal, 2, ',', '.') + " VND";

        // Lưu giá trị vào Local Storage
        localStorage.setItem('product_quantity_' + productId, newQuantity);
        localStorage.setItem('product_total_' + productId, newTotal);
        calculateTotalCart();
      }
    }

    function calculateTotalCart() {
      var allContainers = document.querySelectorAll('.quantity-container');
      var cartTotal = 0;

      allContainers.forEach(function(container) {
        var total = container.querySelector('.total');
        var totalValue = parseFloat(total.innerText.replace(/\./g, '').replace(',', '.'));
        cartTotal += totalValue;

      });
      // Hiển thị tổng giá tiền của giỏ hàng
      var cartTotalElement = document.getElementById('cartTotal');
      cartTotalElement.innerText = numberFormatJs(cartTotal, 2, ',', '.') + " VND";
      localStorage.setItem('cartTotal', cartTotal);
    }

    function numberFormatJs(number, decimals, decPoint, thousandsSep) {
      decimals = decimals || 0;
      number = parseFloat(number);
      if (!isFinite(number) || (!number && number !== 0)) return '';

      var fixedNumber = number.toFixed(decimals);
      var parts = fixedNumber.split('.');
      var intPart = parts[0].replace(/(\d)(?=(\d{3})+$)/g, '$1' + (thousandsSep || ','));
      var fractPart = decimals ? (decPoint || '.') + parts[1] : '';

      return intPart + fractPart;
    }
  </script>
</body>

</html>