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
        <section class="px-[50px] pt-[36px] pb-[12px]">
          <div class="flex">
            <div class="border">
              <div> <img class="cursor-pointer w-[871px] h-[873px]" src="https://13demarzo.net/cdn/shop/files/8_.25-02858.jpg?v=1694138281&width=2200" alt="product-img">
              </div>
              <div class="flex justify-between border">
                <div>
                  <img src="https://13demarzo.net/cdn/shop/files/8_.25-02863.jpg?v=1694138281&width=1646">
                </div>
                <div>
                  <img src="https://13demarzo.net/cdn/shop/files/8_.25-02863.jpg?v=1694138281&width=1646">
                </div>
              </div>
            </div>
            <div class="pl-[40px]">
              <div>
                <p>13DE MARZO</p>
                <div class="w-[415px]">
                  <span class="text-[40px] hover-color">13DE MARZO Denim Pleated Skirt</span>
                </div>
                <div class="my-4">
                  <span class="text-[18px] hover-color">7.385.298,73 VND</span>
                </div>
                <div class="text-[12px] mb-4">
                  Tax included.
                </div>
                <div class="mb-4">
                  <div class="mb-[10px]">Color</div>
                  <input type="radio" name="color" id="blueColor" checked="checked" />
                  <label class="mr-[2px] rounded-full" for="blueColor">Winds Urfer</label>
                  <!-- <input type="radio" name="color" id="redColor" />
                  <label class="mx-[2px] rounded-full" for="redColor">Illusion Red</label> -->
                </div>
                <div>
                  <div class="mb-[10px]">Size</div>
                  <input type="radio" name="size" id="small" checked="checked" />
                  <label class="mr-[2px] rounded-full" for="small">S</label>
                  <input type="radio" name="size" id="medium" />
                  <label class="mx-[2px] rounded-full" for="medium">M</label>
                  <input type="radio" name="size" id="large" />
                  <label for="large" class="ml-[2px] rounded-full">L</label>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>
    </main>
    @include('layouts.footer')
  </div>
</body>

</html>