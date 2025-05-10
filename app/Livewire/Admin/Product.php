<?php

namespace App\Livewire\Admin;

use App\Models\Product as MProduct;
use Livewire\Component;

class Product extends Component
{
    public $products;

    public $product_name;

    public $price;

    public $quantity;

    public $isOut = false;

    public $description;

    public $image;

    public $category_id;

    public $search;


    public function mount()
    {
        $this->products = MProduct::with('category')->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.product')->layout('components.layouts.admin');
    }



}
