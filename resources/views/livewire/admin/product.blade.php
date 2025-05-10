<div class="bg-gray-50 py-10 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Our Products
            </h2>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($products as $product)
                <div class="group relative bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 flex flex-col h-full transform hover:-translate-y-1">
                    <!-- Badge --> @if ($product->is_out)
                        <div class="absolute top-4 right-4 z-10"> <span class="bg-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                                Out of Stock
                            </span>
                        </div>
                @else
                <div class="absolute top-4 right-4 z-10">
                    <span class="bg-green-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                        In Stock
                            </span>
                        </div>
                    @endif

                    <!-- Product Image with Overlay -->
                    <div class="relative overflow-hidden">
                        <div class="aspect-w-4 aspect-h-3">
                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->product_name }}"
                                class="h-64 w-full object-cover object-center transition-transform duration-500 group-hover:scale-110"
                            >
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <!-- Product Content -->
                    <div class="flex-grow p-6 flex flex-col">
                        <!-- Category Tag -->
                        <div class="mb-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                {{ $product->category->name ?? 'Uncategorized' }}
                            </span>
                        </div>

                        <!-- Product Title & Price -->
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                            {{ $product->product_name }}
                        </h3>

                        <!-- Shortened Description with Truncation -->
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                            {{ $product->description }}
                        </p>

                        <!-- Product Specs -->
                        <div class="mt-auto">
                            <div class="flex items-center justify-between py-3 border-t border-gray-100">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-sm text-gray-700">{{ $product->quantity }} in stock</span>
                                </div>
                                <span class="text-xl font-bold text-indigo-600">${{ number_format($product->price, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
