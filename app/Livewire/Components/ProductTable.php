<?php

namespace App\Livewire\Components;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductTable extends Component
{
    use WithFileUploads;

    public $title = 'Edit the product';

    #[Validate('image|max:1024')]
    public $image;

    public $selectedProductId;

    public $product_name;

    public $quantity;

    public $price;

    public $is_out = false;

    public $description;

    public $category_id;

    public $search = '';

    public $selectedCategory = '';

    public $existingImage;

    protected $listeners = [
        'search-updated' => 'handleSearchUpdated',
        'category-updated' => 'handleCategoryUpdated',
    ];

    public function handleSearchUpdated($search)
    {
        $this->search = $search;
    }

    public function handleCategoryUpdated($category)
    {
        $this->selectedCategory = $category;
    }

    protected function rules()
    {
        $uniqueRule = $this->selectedProductId
            ? 'required|string|max:255|min:1|unique:products,product_name,'.$this->selectedProductId
            : 'required|string|max:255|min:1|unique:products,product_name';

        return [
            'product_name' => $uniqueRule,
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'is_out' => 'boolean',
            'image' => 'nullable|image|max:1024',
            'description' => 'required|string|max:255|min:1',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function store()
    {

        $this->validate();

        $data = [
            'product_name' => $this->product_name,
            'image' => $this->image,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'is_out' => $this->is_out,
            'description' => $this->description,
            'category_id' => $this->category_id,
        ];

        if ($this->image) {
            $path = $this->image->store('photos', 'public');
            $data['image'] = $path;

        }
        Product::create($data);
        session()->flash('message', 'Product Created Successfully');

        return redirect()->to('/admin/dashboard');

    }

    public function edit(int $id)
    {
        try {
            $product = Product::findorFail($id);

            $this->selectedProductId = $product->id;
            $this->product_name = $product->product_name;
            $this->quantity = $product->quantity;
            $this->existingImage = $product->image;
            $this->price = $product->price;
            $this->is_out = $product->is_out;
            $this->description = $product->description;
            $this->category_id = $product->category_id;
        } catch (\Exception $e) {
            session()->flash('message', 'Product not found');
        }
    }

    public function update()
    {
        $this->validate();
        if (! $this->selectedProductId) {
            session()->flash('error', 'No product selected for update.');

            return;
        }
        try {
            $product = Product::findOrFail($this->selectedProductId);

            $data = [
                'product_name' => $this->product_name,
                'quantity' => $this->quantity,
                'price' => $this->price,
                'is_out' => $this->is_out,
                'description' => $this->description,
                'category_id' => $this->category_id,
            ];
            if ($this->image) {
                $path = $this->image->store('photos', 'public');
                $data['image'] = $path;
            } else {
                $data['image'] = $this->existingImage;

            }

            $product->update($data);
            session()->flash('message', 'Product updated successfully!');
            redirect()->to('admin/dashboard');
            $this->resetForm();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update product.');
        }
    }

    public function destroy(int $id): void
    {
        Product::findorFail($id)->delete();
        session()->flash('message', 'Product Removed Sucessfully!');
    }

    public function resetForm()
    {
        $this->selectedProductId = null;
        $this->reset([
            'product_name',
            'quantity',
            'price',
            'is_out',
            'description',
            'category_id',
            'image',
        ]);
    }

    private function getFilteredProducts()
    {
        return Product::query()
            ->with('category')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('product_name', 'like', '%'.$this->search.'%')
                        ->orWhere('description', 'like', '%'.$this->search.'%');
                });
            })->paginate(15);
    }

    public function render()
    {
        return view('livewire.components.product-table', [
            'products' => $this->getFilteredProducts(),
            'categories' => Category::pluck('name', 'id'),
            'allCategories' => Category::all(),
        ])->layout('components.layouts.admin');
    }
}
