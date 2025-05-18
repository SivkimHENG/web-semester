<?php

namespace App\Livewire\Components;

use App\Models\Category;
use Livewire\Component;

class CategoryModal extends Component
{


    public $showModal = false;
    public $name = '';
    public $description = '';

    protected $listeners = [
        'openCategoryModal' => 'show'
    ];

    protected $rules = [
    'name'=> 'required|min:3|max:255|unique:categories,name',
    'description'=> 'required|min:3|max:255|unique:categories,description',
    ];

    public function show ()
    {
        $this->showModal = true;
    }

    public function close ()
    {
        $this->reset(['name','description', 'showModal']);
        $this->resetErrorBag();

    }

    public function save()
    {
        $this->validate();
        Category::create([
            'name'=> $this->name,
            'description'=> $this->description
        ]);
        $this->close();
        $this->dispatch('category-created');
        session()->flash('message', 'Category created successfully');
    }


    public function render()
    {
        return view('livewire.components.category-modal');
    }
}
