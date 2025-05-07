<?php

namespace App\Livewire\Admin;

use App\Models\Product as Product_;
use Livewire\Component;

class Product extends Component
{
    public $product_id;

    public string $name = '';

    public int $quantity = 0;

    public float $price = 0.00;

    public bool $is_out = false;

    public string $description = '';

    public string $category = '';

    public function mount($id)
    {
        $product = Product_::findOrFail($id);

        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->quantity = $product->quantity;
        $this->price = $product->price;
        $this->is_out = $product->is_out;
        $this->description = $product->description;
        $this->category = $product->category;
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => 'required|min:3',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
            'category' => 'required',
        ]);

        Product_::find($this->product_id)->update($validated);
        session()->flash('message', 'Product Updated Successfully! ');

    }

    public function render()
    {
        return view('livewire.admin.product')->layout('components.layouts.admin');
    }
}
