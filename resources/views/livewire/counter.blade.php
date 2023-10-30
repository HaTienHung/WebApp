<div class="border border-[#796449BF] cursor-pointer flex h-[47px] items-center justify-between mt-[6px] px-3 py-3 w-[142px]">
    <button wire:click="decrement" class="cursor-pointer text-[16px]">-</button>
    <input class="hidden">{{$count}}</input>
    <button wire:click="increment" class="cursor-pointer text-[16px]">+</button>
</div>