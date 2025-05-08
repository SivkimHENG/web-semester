<?php

namespace App\Livewire\Components;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;

class SearchFilter extends Component
{

    #[Url]
    public ?string $search = '';
    #[Url]
    public ?string $searchCategory = '';




    protected $queryString = [
        'search',
        'selectedCategory',
    ];

    public function updatedSearch()
    {
        $this->dispatch('search-updated', search: $this->search);
    }

    public function updatedSelectedCategory()
    {
        $this->dispatch('category-updated', category: $this->selectedCategory);
    }

    public function render()
    {
        return view('livewire.components.search-filter',[
        'categories' => Category::all(),
        'products' => Product::all(),

    ]);
    }
}
