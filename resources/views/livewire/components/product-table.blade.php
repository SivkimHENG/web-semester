<div class="overflow-x-auto">

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
            {{ session('message') }}
        </div>
    @endif


    <table class="min-w-full divide-y-2 divide-gray-200">
        <thead class="ltr:text-left rtl:text-right">
            <tr class="*:font-medium *:text-gray-900 *:first:sticky *:first:left-0 *:first:bg-white">

                <th class="px-3 py-2 whitespace-nowrap">Name</th>
                <th class="px-3 py-2 whitespace-nowrap">Quantity</th>
                <th class="px-3 py-2 whitespace-nowrap">Price</th>
                <th class="px-3 py-2 whitespace-nowrap">Out of Stock</th>
                <th class="px-3 py-2 whitespace-nowrap">description</th>
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
                        <button wire:click="destroy({{ $product->id }})"
                            class="bg-red-500 px-4 py-2 rounded-md text-gray-100 hover:bg-red-800">
                            Delete
                        </button>
                        <button  wire:click="update({{ $product->id}})"
                            class="bg-green-500 px-4 py-2 rounded-md text-gray-100 hover:bg-green-800">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-10">
        {{ $products->links() }}
    </div>

</div>
