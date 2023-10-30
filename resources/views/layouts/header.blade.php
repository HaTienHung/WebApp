<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body>
  <h6 class="flex justify-center main-color border-b py-[6px] text-[14px]">love is all round</h5>
    <header class="border-b">
      <div class="flex justify-between bg-white-200 px-[50px] py-[18px] items-center font-sans main-color">
        <nav>
          <ul class="flex items-center space-x-5">
            <li>
              <a href="/">
                <img src="//13demarzo.net/cdn/shop/files/13DEMARZO_LOGO.png?v=1676353818" alt="Logo" width="120" height="20" class="mr-4 cursor-pointer">
              </a>
            </li>
            <li class="hover:underline underline-offset-4 cursor-pointer [&>span]:hover:hover-color">
              <Span>Trang chủ</Span>
            </li>
            <li class="hover:underline underline-offset-4 cursor-pointer [&>span]:hover:hover-color" id="dropdownRTW-button">
              <span>Quần áo</span>
              <div class="[&>a]:block [&>a]:py-2 [&>a]:px-6 absolute border-[1px] w-[196px] h-auto py-6 hidden ml-[-16px] mt-3 hover:[&>a]:hover-color [&>a]:text-sm z-10  bg-[#fffefc]" id="dropdownRTW-menu">
                <a>Váy</a>
                <a>Áo</a>
                <a>Áo phông ngắn</a>
                <a>Quần</a>
                <a>Bộ đồ</a>
                <a>Áo khoác</a>
              </div>
            </li>
            <li class="hover:underline underline-offset-4 cursor-pointer [&>span]:hover:hover-color" id="dropdownJewelry-button">
              <span>Trang sức</span>
              <div class="[&>a]:block [&>a]:py-2 [&>a]:px-6 absolute border-[1px] w-[196px] h-auto py-6 hidden ml-[-16px] mt-3 hover:[&>a]:hover-color [&>a]:text-sm z-10 bg-[#fffefc]" id="dropdownJewelry-menu">
                <a>Nhẫn</a>
                <a>Vòng cổ</a>
                <a>Vòng tay</a>
                <a>Khuyên tai</a>
              </div>
            </li>
            <li class="hover:underline underline-offset-4 cursor-pointer [&>span]:hover:hover-color" id="dropdownAccessories-button">
              <span>Phụ kiện</span>
              <div class="[&>a]:block [&>a]:py-2 [&>a]:px-6 absolute border-[1px] w-[196px] h-auto py-6 hidden ml-[-16px] mt-3 hover:[&>a]:hover-color [&>a]:text-sm z-10 bg-[#fffefc]" id="dropdownAccessories-menu">
                <a>Mũ</a>
                <a>Khăn quàng</a>
                <a>Tất</a>
                <a>Khẩu trang</a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="flex items-center">
          <div class="relative">
            <input type="text" placeholder="Search" class="rounded-full w-72 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline border-2 shadow-md main-color placeholder:main-color border-[#796449BF]">
          </div>
          <div class="flex justify-between items-center space-x-4 ml-8">
            <a class="w-12 h-12 hover:scale-[1.05] transition duration-500 ease-in-out cursor-pointer flex items-center justify-center ">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 align-middle" aria-hidden="true" focusable="false" role="presentation" class="icon icon-account" fill="none" viewBox="0 0 18 19">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 4.5a3 3 0 116 0 3 3 0 01-6 0zm3-4a4 4 0 100 8 4 4 0 000-8zm5.58 12.15c1.12.82 1.83 2.24 1.91 4.85H1.51c.08-2.6.79-4.03 1.9-4.85C4.66 11.75 6.5 11.5 9 11.5s4.35.26 5.58 1.15zM9 10.5c-2.5 0-4.65.24-6.17 1.35C1.27 12.98.5 14.93.5 18v.5h17V18c0-3.07-.77-5.02-2.33-6.15-1.52-1.1-3.67-1.35-6.17-1.35z" fill="currentColor">
                </path>
              </svg>
            </a>
            <a class="w-12 h-12 hover:scale-[1.05] transition duration-500 ease-in-out cursor-pointer">
              <svg focusable="false" role="presentation" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" fill="none" class="w-12 h-12 align-middle">
                <path d="m15.75 11.8h-3.16l-.77 11.6a5 5 0 0 0 4.99 5.34h7.38a5 5 0 0 0 4.99-5.33l-.78-11.61zm0 1h-2.22l-.71 10.67a4 4 0 0 0 3.99 4.27h7.38a4 4 0 0 0 4-4.27l-.72-10.67h-2.22v.63a4.75 4.75 0 1 1 -9.5 0zm8.5 0h-7.5v.63a3.75 3.75 0 1 0 7.5 0z" fill="currentColor" fill-rule="evenodd"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </header>
    <script>
      let dropDownRTWButton = document.querySelector("#dropdownRTW-button");
      let dropDownRTWMenu = document.querySelector("#dropdownRTW-button #dropdownRTW-menu");

      dropDownRTWButton.addEventListener('click', () => {
        dropDownRTWMenu.classList.toggle("hidden");
      })

      document.addEventListener('click', e => {
        if (!dropDownRTWMenu.contains(e.target) && !dropDownRTWButton.contains(e.target)) {
          dropDownRTWMenu.classList.add("hidden");
        }
      })
      let dropDownJewelryButton = document.querySelector("#dropdownJewelry-button");
      let dropDownJewelryMenu = document.querySelector("#dropdownJewelry-button #dropdownJewelry-menu");

      dropDownJewelryButton.addEventListener('click', () => {
        dropDownJewelryMenu.classList.toggle("hidden");
      })

      document.addEventListener('click', e => {
        if (!dropDownJewelryMenu.contains(e.target) && !dropDownJewelryButton.contains(e.target)) {
          dropDownJewelryMenu.classList.add("hidden");
        }
      })

      let dropDownAccessoriesButton = document.querySelector("#dropdownAccessories-button");
      let dropDownAccessoriesMenu = document.querySelector("#dropdownAccessories-button #dropdownAccessories-menu");

      dropDownAccessoriesButton.addEventListener('click', () => {
        dropDownAccessoriesMenu.classList.toggle("hidden");
      })

      document.addEventListener('click', e => {
        if (!dropDownAccessoriesMenu.contains(e.target) && !dropDownAccessoriesButton.contains(e.target)) {
          dropDownAccessoriesMenu.classList.add("hidden");
        }
      })
    </script>
</body>

</html>