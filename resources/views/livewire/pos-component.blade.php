<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Left Column: Product Entry & Cart -->
    <div class="md:col-span-2 bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Kasir - Fast Entry</h2>

        @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                {{ session('error') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Scan/Input Kode Barang</label>
            <input type="text" wire:model.live.debounce.500ms="product_code"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border p-3 text-lg"
                placeholder="Contoh: L10" autofocus>
        </div>

        <h3 class="text-lg font-semibold mb-2">Keranjang Belanja</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-left">Produk</th>
                        <th class="px-3 py-2 text-right">Harga</th>
                        <th class="px-3 py-2 text-center">Qty</th>
                        <th class="px-3 py-2 text-right">Subtotal</th>
                        <th class="px-3 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($cart as $index => $item)
                        <tr>
                            <td class="px-3 py-2 flex items-center">
                                <div class="h-10 w-10 flex-shrink-0 mr-3 border rounded overflow-hidden">
                                    @if($item['image_path'])
                                        <img src="{{ asset('storage/' . $item['image_path']) }}"
                                            class="h-full w-full object-cover">
                                    @else
                                        <div
                                            class="h-full w-full bg-gray-200 flex items-center justify-center text-xs text-gray-500">
                                            No IMG</div>
                                    @endif
                                </div>
                                <div>
                                    <div class="font-semibold">{{ $item['name'] }}</div>
                                    <div class="text-xs text-gray-500">{{ $item['code'] }}</div>
                                </div>
                            </td>
                            <td class="px-3 py-2 text-right">{{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td class="px-3 py-2 text-center">{{ $item['quantity'] }}</td>
                            <td class="px-3 py-2 text-right">{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                            <td class="px-3 py-2 text-center">
                                <button wire:click="removeItem({{ $index }})"
                                    class="text-red-500 hover:text-red-700">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-3 py-4 text-center text-gray-500">Keranjang kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Column: Checkout -->
    <div class="bg-white rounded-lg shadow-md p-6 h-fit">
        <h2 class="text-xl font-bold mb-4 border-b pb-2">Pembayaran</h2>

        <div class="mb-4 flex justify-between items-center text-xl font-bold">
            <span>Total:</span>
            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Bayar (Rp)</label>
            <input type="number" wire:model.live="amount_paid"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border p-3 text-right text-lg">
        </div>

        <div
            class="mb-6 flex justify-between items-center text-lg font-semibold {{ $change < 0 ? 'text-red-500' : 'text-green-600' }}">
            <span>Kembalian:</span>
            <span>Rp {{ number_format($change, 0, ',', '.') }}</span>
        </div>

        <button wire:click="checkout"
            class="w-full bg-blue-600 text-white py-3 rounded-lg font-bold text-lg hover:bg-blue-700 disabled:opacity-50"
            {{ empty($cart) ? 'disabled' : '' }}>
            PROSES TRANSAKSI
        </button>
    </div>
</div>