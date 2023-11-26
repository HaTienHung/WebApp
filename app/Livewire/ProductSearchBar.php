<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSearchBar extends Component
{
    public $query;
    public $products = [];
    public $productCount = 0;

    public function render()
    {
        $this->products = Product::where('name', 'like', '%' . $this->query . '%')->get();
        return view('livewire.product-search-bar');
    }
    public function showAllResults()
    {
        $this->redirect('/search/' . $this->query);
    }
}
