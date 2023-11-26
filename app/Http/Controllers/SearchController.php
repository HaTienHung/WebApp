<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public $query;
    public $products = [];
    public function showResults($query)
    {
        $this->query = $query;
        $this->products = Product::where('name', 'like', '%' . $query . '%')->orderBy('price', 'desc')->paginate(16);
        return view('searchResult', ['query' => $query, 'products' => $this->products]);
    }
}
