<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [ProductController::class, "index"])->name('product.index');
Route::get('/products', function () {
    return view('productDetail');
});
Route::get('/product/create', [ProductController::class, "create"])->name('product.create');
Route::get('products/{processedName}', [ProductController::class, "showProductDetail"])->name('product.show');
Route::get('pages/{category}', [ProductController::class, "showProductCategory"])->name('product.showCategory');

Route::post('/product', [ProductController::class, "store"])->name('product.store');
