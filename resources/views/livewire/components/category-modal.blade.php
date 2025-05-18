<div x-data="{ show: @entangle('showModal') }" 
     x-cloak
     @keydown.window.escape="show = false"
     class="relative z-50">

    <!-- Trigger Button -->
    <button @click="show = true" 
            class="bg-green-500 hover:bg-blue-700 text-white font-bold px-3 py-4 rounded">
        Create New Category
    </button>

    <!-- Modal -->
    <template x-teleport="body">
        <div x-show="show" 
             class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            
            <div @click.outside="show = false; $wire.close()" 
                 x-show="show"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md">
                
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Create New Category</h3>
                    <button @click="show = false; $wire.close()" 
                            class="text-gray-500 hover:text-gray-700">
                        ✕
                    </button>
                </div>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit.prevent="save">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Category Name</label>
                            <input type="text" 
                                   wire:model="name"
                                   class="w-full px-3 py-2 border rounded-md @error('name') border-red-500 @enderror"
                                   autofocus>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Category Description</label>
                            <input type="text" 
                                   wire:model="description"
                                   class="w-full px-3 py-2 border rounded-md @error('name') border-red-500 @enderror"
                                   autofocus>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" 
                                    @click="show = false; $wire.close()"
                                    class="px-4 py-2 text-gray-600 hover:text-gray-800">
                                Cancel
                            </button>
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </template>
</div>