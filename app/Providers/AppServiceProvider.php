<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('layouts.header', function ($view) {
            $clothingCategories = [
                ['name' => 'Váy', 'category' => 'vay'],
                ['name' => 'Áo', 'category' => 'ao'],
                ['name' => 'Áo phông ngắn', 'category' => 'ao-phong-ngan'],
                ['name' => 'Quần', 'category' => 'quan'],
                ['name' => 'Bộ đồ', 'category' => 'bo-do'],
                ['name' => 'Áo khoác', 'category' => 'ao-khoac'],
            ];
            $jewelryCategories = [
                ['name' => 'Nhẫn', 'category' => 'nhan'],
                ['name' => 'Vòng cổ', 'category' => 'vong-co'],
                ['name' => 'Vòng tay', 'category' => 'vong-tay'],
                ['name' => 'Khuyên tai', 'category' => 'khuyen-tai'],
            ];
            $accessoriesCategories = [
                ['name' => 'Mũ', 'category' => 'mu'],
                ['name' => 'Khăn quàng', 'category' => 'khan-quang'],
                ['name' => 'Tất', 'category' => 'tat'],
                ['name' => 'Khẩu trang', 'category' => 'khau-trang'],
            ];
            $view->with('clothingCategories', $clothingCategories)
                ->with('jewelryCategories', $jewelryCategories)
                ->with('accessoriesCategories', $accessoriesCategories);
        });
    }
}
