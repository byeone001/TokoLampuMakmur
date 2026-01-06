<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Admin Dashboard - Manage Products</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <h3 class="text-lg font-semibold mb-2">{{ $isEdit ? 'Edit Product' : 'Add New Product' }}</h3>
            <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Product Code</label>
                    <input type="text" wire:model="product_code"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border p-2">
                    @error('product_code') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" wire:model="name"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border p-2">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" wire:model="price"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border p-2">
                    @error('price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" wire:model="stock"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border p-2">
                    @error('stock') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" wire:model="image"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" class="mt-2 h-20 w-auto rounded">
                    @elseif ($image_path)
                        <img src="{{ asset('storage/' . $image_path) }}" class="mt-2 h-20 w-auto rounded">
                    @endif
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                        {{ $isEdit ? 'Update' : 'Save' }}
                    </button>
                    @if($isEdit)
                        <button type="button" wire:click="cancel"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
                    @endif
                </div>
            </form>
        </div>

        <div>
            <h3 class="text-lg font-semibold mb-2">Product List</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Code</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Stock</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($products as $product)
                            <tr>
                                <td class="px-3 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $product->product_code }}</td>
                                <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500">{{ $product->name }}</td>
                                <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500">
                                    {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500">{{ $product->stock }}</td>
                                <td class="px-3 py-2 whitespace-nowrap text-sm font-medium">
                                    <button wire:click="edit({{ $product->id }})"
                                        class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</button>
                                    <button wire:click="delete({{ $product->id }})" class="text-red-600 hover:text-red-900"
                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>