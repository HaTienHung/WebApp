<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(Product $product)
    {
        $products = Product::all();
        return view('welcome', ['products' => $products]);
        // return view('productsHandle.index');
    }
    public function create()
    {
        return view('productsHandle.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|decimal:2',
            'colors' => 'nullable',
            'sizes' => 'required',
            'quantity' => 'required',
            'description' => 'nullable',
            'productImage' => 'required',
            'category' => 'required',
        ]);
        $data['processedName'] =  str_replace(' ', '-', $data['name']);
        $newProduct = Product::create($data);

        return redirect(route("product.create"));
    }
    public function show($processedName)
    {
        $product = Product::where('processedName', $processedName)->first();

        if ($product) {
            return view('productDetail', compact('product'));
        } else {
            // Xử lý khi sản phẩm không tồn tại
            abort(404);
        }
    }
    public function showProductCategory($category)
    {
        $products = Product::where('category', $category)->get();
        return view('showCategory', ['products' => $products]);
    }
}
