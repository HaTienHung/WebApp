<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $newProducts = Product::orderBy('created_at', 'desc')->take(10)->get();
        return view('welcome', ['products' => $products, 'newProducts' => $newProducts]);
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
            'sizes' => 'nullable',
            'quantity' => 'required',
            'description' => 'nullable',
            'productImage' => 'required',
            'category' => 'required',
        ]);
        $data['processedName'] =  str_replace(' ', '-', $data['name']);
        $newProduct = Product::create($data);

        return redirect(route("product.create"))->with('success', 'Product Created Successfully');
    }

    public function showProductDetail($processedName)
    {
        $product = Product::where('processedName', $processedName)->first();

        if ($product) {
            return view('productDetail', compact('product'));
        } else {
            abort(404);
        }
    }

    public function showProductCategory($category)
    {
        $cleanedCategory = str_replace('-', ' ', $category);
        $category = Category::where('slug', $cleanedCategory)->first();
        $products = Product::where('category_id', $category->id)->orderBy('price', 'desc')->get();
        return view('showCategory', ['products' => $products, 'category' => $category]);
    }

    public function records(Request $request)
    {
        // Lấy dữ liệu từ Database, sắp xếp theo ID hoặc bất kỳ trường nào bạn muốn
        $products = Product::orderBy('price', 'desc')->paginate(16);
        return view('productAll', ['products' => $products]);
    }
}
