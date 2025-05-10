<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProductImages extends Component
{
    use WithFileUploads;

    public ?string $name;

    public ?string $path;

    protected function rules()
    {
        return [
            'name' => 'required|string|unique:products,product_name',

        ];

    }

    public function save()
    {


    }

    public function render()
    {
        return view('livewire.components.product-images');
    }
}
