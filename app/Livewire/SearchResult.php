<?php

namespace App\Livewire;

use Livewire\Component;

class SearchResult extends Component
{
    public $query;
    public $products = [];

    protected $listeners = ['showAllResults'];

    public function showAllResults($products, $query)
    {
        $this->products = $products;
        $this->query = $query;
    }

    public function render()
    {
        return view('livewire.search-result');
    }
}
