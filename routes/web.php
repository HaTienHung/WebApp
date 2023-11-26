<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;



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

//User interface
Route::get('/products', function () {
    return view('productDetail');
});
Route::get('products/{processedName}', [ProductController::class, "showProductDetail"])->name('product.show');
Route::get('pages/{category}', [ProductController::class, "showProductCategory"])->name('product.showCategory');
Route::get('/search/{query}', [SearchController::class, "showResults"])->name('search.results');
Route::get('/collection/all', [ProductController::class, "records"])->name('show.allProduct');


//Cart
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::delete('/remove-from-cart/{productId}/{productSize}/{productColor}', [CartController::class, 'removeFromCart'])->name('remove.from.cart');

//Checkout
Route::post('/update-quantity/{productId}', [CartController::class, 'updateQuantity'])
    ->name('cart.updateQuantity');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');


//User account
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //CRUD product
    Route::get('/product/create', [ProductController::class, 'create'])
        ->name('product.create')
        ->middleware('check_user_id');
    Route::post('/product', [ProductController::class, "store"])->name('product.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
