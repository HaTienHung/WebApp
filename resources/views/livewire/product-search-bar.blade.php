<div class="relative">
    <input wire:model.live.debounce.800ms="query" type="text" placeholder="Search" spellcheck="false" class="border-2 border-[#796449BF] focus:outline-none focus:shadow-outline main-color pl-8 placeholder:main-color px-4 py-1 shadow-lg w-80" />
    <div class="absolute mt-4 shadow-md z-10" id="dropdown">
        <div>
            @if (!empty($query) && count($products) > 0)
            <h5 class="border-b px-5 py-1">Products</h5>
            <ul>
                @foreach($products as $product)
                @if ($productCount < 5) <li>
                    <a class="[&>div>h3]:hover:bg-[rgba(121,100,73,.04)] cursor-pointer flex hover:bg-[rgba(121,100,73,.04)] hover:underline items-center px-5 py-2.5 underline-offset-4" href="{{route('product.show',['processedName'=>$product->processedName])}}">
                        @foreach (json_decode($product->productImage) as $key => $image)
                        @if($key==0)
                        <img class=" h-10 mr-[1.2rem] w-10" src="{{$image}}" alt="{{$product->name}}" />
                        @endif
                        @endforeach
                        <div>
                            <h3 class="text-sm">{{$product->name}}</h3>
                        </div>
                    </a>
                    </li>
                    @php $productCount++; @endphp
                    @endif
                    @endforeach
            </ul>
            @endif
        </div>
    </div>
</div>
<script>
    // Lấy phần dropdown và input
    const dropdown = document.getElementById('dropdown');
    const input = document.querySelector('input[type="text"]');

    // Thêm xử lý sự kiện "click" cho toàn bộ trang
    document.addEventListener('click', function(event) {
        if (!dropdown.contains(event.target) && event.target !== input) {
            // Nếu người dùng click ra ngoài dropdown và không phải là trường input, ẩn dropdown
            dropdown.style.display = 'none';
        } else {
            dropdown.style.display = 'block';
        }
    });
</script>