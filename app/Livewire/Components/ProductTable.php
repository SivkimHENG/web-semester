<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;

class ProductTable extends Component
{

    public function update()
    {

        $this->validate();

        session()->flash('message', 'Product Updated Sucessfully!');
    }

    public function destroy(int $id): void
    {
        Product::destroy($id);
        session()->flash('message', 'Product Removed Sucessfully!');
    }

    public function render()
    {
        return view('livewire.components.product-table', [
            'products' => Product::with('category')->paginate(20),
        ])->layout('components.layouts.admin');
    }
}
