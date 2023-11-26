<div class="relative w-80">
    <div class="flex items-center">
        <input wire:model.live.debounce.800ms="query" type="text" placeholder="Tìm kiếm..." spellcheck="false" class="bg-[#fffefc] border-[#796449BF] border-[1px] focus:outline-none focus:shadow-outline main-color pl-8 placeholder:main-color px-4 py-1 shadow-sm w-80" />
        <div class="ml-[-35px]">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="20px" height="20px" class="cursor-pointer">
                <g transform="">
                    <g fill-opacity="0.74902" fill="#796449" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <g transform="scale(8.53333,8.53333)">
                            <path d="M13,3c-5.511,0 -10,4.489 -10,10c0,5.511 4.489,10 10,10c2.39651,0 4.59738,-0.85101 6.32227,-2.26367l5.9707,5.9707c0.25082,0.26124 0.62327,0.36648 0.97371,0.27512c0.35044,-0.09136 0.62411,-0.36503 0.71547,-0.71547c0.09136,-0.35044 -0.01388,-0.72289 -0.27512,-0.97371l-5.9707,-5.9707c1.41266,-1.72488 2.26367,-3.92576 2.26367,-6.32227c0,-5.511 -4.489,-10 -10,-10zM13,5c4.43012,0 8,3.56988 8,8c0,4.43012 -3.56988,8 -8,8c-4.43012,0 -8,-3.56988 -8,-8c0,-4.43012 3.56988,-8 8,-8z"></path>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
    </div>
    <div class="absolute bg-[#fffefc] mt-4 shadow-md z-10" id="dropdown">
        <div>
            @if (!empty($query))
            @if (count($products) > 0)
            <h5 class="border-b px-5 py-1">Sản phẩm</h5>
            <ul>
                @foreach($products as $product)
                @if ($productCount < 5) <li>
                    <a class="cursor-pointer flex hover:bg-[rgba(121,100,73,.04)] hover:underline items-center px-5 py-2.5 underline-offset-4" href="{{route('product.show',['processedName'=>$product->processedName])}}">
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
                    <li>
                        <div>
                            <button wire:click="showAllResults" class="px-5 py-2 hover:bg-[rgba(121,100,73,.04)] w-full">Xem tất cả kết quả</button>
                        </div>
                    </li>
            </ul>
            @else
            <ul>
                <li>
                    <p class="bg-[#fffefc] py-2 text-[#796449BF]">Không tìm thấy sản phẩm nào phù hợp.</p>
                </li>
            </ul>
            @endif
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