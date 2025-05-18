<div class="overflow-x-auto">
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-md">
            {{ session('error') }}
        </div>
    @endif


       <div class="mt-10 mb-5 pl-5">
    <div class="flex gap-4 items-center mb-5">
        <div>
            <livewire:components.category-modal/>
        </div>
        
<div x-data="{ createModalOpen: false }" @keydown.escape.window="createModalOpen = false">
    <button @click="$wire.resetForm(); createModalOpen = true"
        class="bg-green-500 px-3 py-4 text-gray-100 hover:bg-green-800 transition-colors border rounded">
        Create New Product
    </button>

    <template x-teleport="body">
        <div x-show="createModalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
            <!-- backdrop -->
            <div @click="createModalOpen = false" x-show="createModalOpen" x-transition.opacity
                class="absolute inset-0 backdrop-blur-md  bg-opacity-50"></div>
            <div x-show="createModalOpen" x-trap.noscroll="createModalOpen" x-transition
                class="relative bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Create New Product</h3>
                    <button type="button" @click="createModalOpen = false" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                        ✕
                    </button>
                </div>
                <form wire:submit.prevent="store" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium">Name</label>
                        <input type="text" wire:model.defer="product_name"
                            class="mt-1 block w-full border rounded px-3 py-2">
                        @error('product_name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium">Quantity</label>
                            <input type="number" wire:model.defer="quantity" min="0"
                                class="mt-1 block w-full border rounded px-3 py-2">
                            @error('quantity')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Price</label>
                            <input type="number" wire:model.defer="price" step="0.01" min="0"
                                class="mt-1 block w-full border rounded px-3 py-2">
                            @error('price')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" wire:model.defer="is_out" id="create_is_out_checkbox"
                            class="h-4 w-4">
                        <label for="create_is_out_checkbox" class="text-sm">Out of Stock</label>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Description</label>
                        <textarea wire:model.defer="description" rows="3" class="mt-1 block w-full border rounded px-3 py-2"></textarea>
                        @error('description')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Category</label>
                        <select wire:model.defer="category_id"
                            class="mt-1 block w-full border rounded px-3 py-2">
                            <option value="">— none —</option>
                            @foreach ($categories as $id => $name)
                                <option value="{{ $id }}">
                                    {{ $name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <label for="File"
                        class="block rounded border border-gray-300 p-4 text-gray-900 shadow-sm sm:p-6">
                        <div class="flex items-center justify-center gap-4">
                            <span class="font-medium"> Upload your photo </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                            </svg>
                        </div>
                        <input type="file" wire:model="image" id="File" class="sr-only" />
                        @error('image')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="createModalOpen = false"
                            class="px-4 py-2 border rounded hover:bg-gray-100">
                            Cancel
                        </button>
                        <button type="submit"
                            @click="$wire.store().then(() => { if (!$wire.hasErrors) createModalOpen = false })"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Create Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </template>
</div>
    </div>
        <livewire:components.search-filter />




        <table class="min-w-full divide-y-2 divide-gray-200">
            <thead class="ltr:text-left rtl:text-right">
                <tr class="*:font-medium *:text-gray-900 *:first:sticky *:first:left-0 *:first:bg-white">
                    <th class="px-3 py-2 whitespace-nowrap">Name</th>
                    <th class="px-3 py-2 whitespace-nowrap">Quantity</th>
                    <th class="px-3 py-2 whitespace-nowrap">Price</th>
                    <th class="px-3 py-2 whitespace-nowrap">Out of Stock</th>
                    <th class="px-3 py-2 whitespace-nowrap">Description</th>
                    <th class="px-3 py-2 whitespace-nowrap">Category</th>
                    <th class="px-3 py-2 whitespace-nowrap">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($products as $product)
                    <tr class="*:text-gray-900 *:first:sticky *:first:left-0 *:first:bg-white *:first:font-medium">
                        <td class="px-3 py-2 whitespace-nowrap">{{ $product->product_name }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $product->quantity }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">${{ $product->price }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            @if ($product->is_out)
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    Out of Stock
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Available
                                </span>
                            @endif
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap truncate max-w-xs">{{ $product->description }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            @if ($product->category && $product->category->name)
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $product->category->name }}
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-200 text-gray-600">
                                    nothing
                                </span>
                            @endif
                        </td>
                        <td class="ml-2.5 text-xs">
                            <div class="inline-block">
                                <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false"
                                    :class="{ 'z-40': modalOpen }" class="relative w-auto h-auto">
                                    <!-- Fixed the syntax error in the click handler -->
                                    <button @click="$wire.edit({{ $product->id }}).then(() => modalOpen = true)"
                                        class="inline-flex items-center justify-center px-4 py-2 transition-colors bg-blue-500 border rounded-md text-white hover:bg-blue-600">
                                        Edit
                                    </button>
                                    <template x-teleport="body">
                                        <div x-show="modalOpen" x-cloak
                                            class="fixed inset-0 z-50 flex items-center justify-center">
                                            <!-- backdrop -->
                                            <div @click="modalOpen = false" x-show="modalOpen" x-transition.opacity
                                                class="absolute inset-0 backdrop-blur-md bg-opacity-50"></div>
                                            <div x-show="modalOpen" x-trap="modalOpen" x-transition
                                                class="relative bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
                                                <div class="flex justify-between items-center mb-4">
                                                    <h3 class="text-lg font-semibold">{{ $title }}</h3>
                                                    <button @click="modalOpen = false"
                                                        class="text-gray-600 hover:text-gray-800">
                                                        ✕
                                                    </button>
                                                </div>
                                                <!-- Livewire form -->
                                                <form wire:submit.prevent="update" enctype="multipart/form-data"
                                                    class="space-y-4">
                                                    <div>
                                                        <label class="block text-sm font-medium">Name</label>
                                                        <input type="text" wire:model.defer="product_name"
                                                            class="mt-1 block w-full border rounded px-3 py-2">
                                                        @error('product_name')
                                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-4">
                                                        <div>
                                                            <label class="block text-sm font-medium">Quantity</label>
                                                            <input type="number" wire:model.defer="quantity"
                                                                min="0"
                                                                class="mt-1 block w-full border rounded px-3 py-2">
                                                            @error('quantity')
                                                                <span
                                                                    class="text-red-600 text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div>
                                                            <label class="block text-sm font-medium">Price</label>
                                                            <input type="number" wire:model.defer="price"
                                                                step="0.01" min="0"
                                                                class="mt-1 block w-full border rounded px-3 py-2">
                                                            @error('price')
                                                                <span
                                                                    class="text-red-600 text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center space-x-2">
                                                        <input type="checkbox" wire:model.defer="is_out"
                                                            id="is_out_checkbox" class="h-4 w-4">
                                                        <label for="is_out_checkbox" class="text-sm">Out of
                                                            Stock</label>
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium">Description</label>
                                                        <textarea wire:model.defer="description" rows="3" class="mt-1 block w-full border rounded px-3 py-2"></textarea>
                                                        @error('description')
                                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium">Category</label>
                                                        <select wire:model.defer="category_id"
                                                            class="mt-1 block w-full border rounded px-3 py-2">
                                                            <option value="">— none —</option>
                                                            @foreach ($categories as $id => $name)
                                                                <option value="{{ $id }}">
                                                                    {{ $name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium">Image</label>

                                                        <!-- Preview Existing Image -->
                                                        @if ($existingImage)
                                                            <img src="{{ asset('storage/' . $existingImage) }}"
                                                                alt="Current Image"
                                                                class="mb-2 h-24 w-24 object-cover rounded">
                                                        @endif

                                                        <!-- New Image Upload -->
                                                        <input type="file" wire:model="image" id="edit_image"
                                                            class="sr-only">
                                                        <label for="edit_image"
                                                            class="block cursor-pointer p-4 border rounded hover:bg-gray-50">
                                                            <div class="flex items-center justify-center gap-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-6 w-6" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                                </svg>
                                                                <span class="text-sm">Upload New Image</span>
                                                            </div>
                                                        </label>

                                                        <!-- Preview New Image -->
                                                        @if ($image)
                                                            <div class="mt-2">
                                                                <span class="block text-sm text-gray-500">New
                                                                    Preview:</span>
                                                                <img src="{{ $image->temporaryUrl() }}"
                                                                    alt="New Image Preview"
                                                                    class="h-24 w-24 object-cover rounded">
                                                            </div>
                                                        @endif

                                                        @error('image')
                                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="flex justify-end space-x-2">
                                                        <button type="button" @click="modalOpen = false"
                                                            class="px-4 py-2 border rounded hover:bg-gray-100">
                                                            Cancel
                                                        </button>
                                                        <button type="submit"
                                                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                                            {{ $selectedProductId ? 'Save Changes' : 'Create Product' }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            <div class="inline-block">
                                <div x-data="{ deleteModalOpen: false }" @keydown.escape.window="deleteModalOpen = false"
                                    class="relative">
                                    <!-- Delete Button -->
                                    <button
                                        @click="deleteModalOpen = true; $wire.selectedProductId = {{ $product->id }}"
                                        class="bg-red-500 px-4 py-2 rounded-md text-gray-100 hover:bg-red-800">
                                        Delete
                                    </button>
                                    <!-- Delete Confirmation Modal -->
                                    <template x-teleport="body">
                                        <div x-show="deleteModalOpen"
                                            class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
                                            x-cloak>
                                            <!-- Dark Blur Backdrop -->
                                            <div x-show="deleteModalOpen" x-transition:enter="ease-out duration-300"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="ease-in duration-300"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0" @click="deleteModalOpen = false"
                                                class="absolute inset-0 w-full h-full  bg-opacity-60 backdrop-blur-md">
                                            </div>
                                            <!-- Modal Content -->
                                            <div x-show="deleteModalOpen" x-trap.inert.noscroll="deleteModalOpen"
                                                x-transition:enter="ease-out duration-300"
                                                x-transition:enter-start="opacity-0 scale-90"
                                                x-transition:enter-end="opacity-100 scale-100"
                                                x-transition:leave="ease-in duration-200"
                                                x-transition:leave-start="opacity-100 scale-100"
                                                x-transition:leave-end="opacity-0 scale-90"
                                                class="relative w-full py-6 bg-white shadow-md px-7 sm:max-w-lg sm:rounded-lg">
                                                <div class="flex items-center justify-between pb-3">
                                                    <h3 class="text-lg font-semibold">Confirm Deletion</h3>
                                                    <button @click="deleteModalOpen = false"
                                                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                                        ✕
                                                    </button>
                                                </div>
                                                <div class="relative w-auto pb-8">
                                                    <p class="text-gray-700">
                                                        Are you sure you want to delete this product?<br>
                                                        <span class="font-medium">This action cannot be undone.</span>
                                                    </p>
                                                </div>
                                                <div
                                                    class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                                                    <button @click="deleteModalOpen = false" type="button"
                                                        class="px-4 py-2 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">
                                                        Cancel
                                                    </button>
                                                    <button wire:click="destroy({{ $product->id }})"
                                                        @click="deleteModalOpen = false" type="button"
                                                        class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                                                        Confirm Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-10">
            {{ $products->links() }}
        </div>
    </div>
