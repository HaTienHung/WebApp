<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Đặt hàng</title>
</head>

<body>
  <div>
    @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    @endif
    <main class="min-h-screen">
      <header class="border-b px">
        <div class="bg-white-200 flex items-center justify-between main-color py-[18px] px-[120px]">
          <div>
            <a href="/">
              <img src="//13demarzo.net/cdn/shop/files/13DEMARZO_LOGO.png?v=1676353818" alt="Logo" width="120" height="20" class="cursor-pointer mr-4">
            </a>
          </div>
          <div class="flex items-center">
            <a href="{{route('cart.show')}}" class="cursor-pointer duration-500 ease-in-out h-12 hover:scale-[1.05] transition w-12">
              <svg focusable="false" role="presentation" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" fill="none" class="align-middle h-12 w-12">
                <path d="m15.75 11.8h-3.16l-.77 11.6a5 5 0 0 0 4.99 5.34h7.38a5 5 0 0 0 4.99-5.33l-.78-11.61zm0 1h-2.22l-.71 10.67a4 4 0 0 0 3.99 4.27h7.38a4 4 0 0 0 4-4.27l-.72-10.67h-2.22v.63a4.75 4.75 0 1 1 -9.5 0zm8.5 0h-7.5v.63a3.75 3.75 0 1 0 7.5 0z" fill="currentColor" fill-rule="evenodd"></path>
              </svg>
            </a>
          </div>
        </div>
      </header>
      <section class="text-black">
        <section class="relative ">
          <form action="{{ route('confirm.order',['cart' => $cart]) }}" method="post">
            @csrf
            <div class="h-[1000px] flex justify-center">
              <div class="p-10">
                <div>
                  <h1 class="flex justify-center text-2xl">Thông tin liên hệ</h1>
                  <label class="mb-2">Email</label><br>
                  <input type="email" class="p-2 border w-[570px] rounded-md my-2" name="guest_email" required><br>
                  <label>Tên</label><br>
                  <input type="string" class="p-2 border w-[570px] rounded-md my-2" name="guest_name" required><br>
                  <label>Địa chỉ</label><br>
                  <input type="string" class="p-2 border w-[570px] rounded-md my-2" name="guest_address" required><br>
                  <label>Số điện thoại</label><br>
                  <input type="string" class="p-2 border w-[570px] rounded-md my-2" name="guest_phone" required><br>
                </div>
                <div class="bg-[#F3D9A8] border duration-250 ease-in-out flex h-[48px] hover:scale-[1.009] justify-center rounded-xl text-black transition mt-2">
                  <button type="submit" class="bg-[#F3D9A8]">Xác nhận</button>
                </div>
              </div>
              <div class="border-l bg-[#F5F5F5] w-[550px]">
                <div class="p-10">
                  <h1 class="text-2xl pb-2">Thông tin đơn hàng</h1>
                  @foreach ($cart as $item)
                  <div class="flex py-2">
                    <div class="w-16 h-16">
                      <div class="border rounded-md">
                        <img src="{{$item['image']}}" class="w-16 h-16 rounded-md">
                      </div>
                    </div>
                    <div class="flex w-[350px] flex-wrap ml-3 text-[14px]">
                      <p>{{ $item['name'] }}</p>
                      <p class="w-full text-[12px] text-gray-600">
                        @if ($item['color'] && $item['size'])
                        {{ $item['color'] }}/{{ $item['size'] }}
                        @elseif ($item['color'])
                        {{ $item['color'] }}
                        @elseif ($item['size'])
                        {{ $item['size'] }}
                        @endif
                      </p>
                      <p class="text-[12px] text-gray-600">Số lượng: {{ $item['quantity'] }}</p>
                    </div>
                    <div>
                      <input type="hidden" name="cart" value="{{ json_encode(session('cart', [])) }}">
                    </div>
                  </div>
                  @endforeach
                  <div class="justify-between flex  py-3">
                    <p>Tổng tiền: </p>
                    <input type="hidden" value="{{$total}}" name="orderedTotal">
                    <p class="text-right">{{number_format( $total, 2, ',', '.')}} VND</p>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </section>
      </section>
    </main>
    @include('layouts.footer')
  </div>
</body>

</html>