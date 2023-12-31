<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tổng quan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bạn đã đăng nhập thành công!") }}
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('error'))
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class=" text-gray-900 dark:text-gray-100">
                        {{session('error')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="flex justify-center pt-12">
        <x-primary-button>
            <a href="/"> Quay về trang chủ</a>
        </x-primary-button>
    </div>
</x-app-layout>