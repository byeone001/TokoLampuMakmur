<div class="p-6 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Laporan Penjualan Saya</h2>
        <div class="flex gap-2">
            <button wire:click="exportExcel" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Export
                Excel</button>
            <button wire:click="exportPdf" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Export
                PDF</button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 border">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                    </th>
                    <th class="px-3 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Total
                    </th>
                    <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($transactions as $transaction)
                    <tr>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900">#{{ $transaction->daily_sequence }}</td>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500">
                            {{ $transaction->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900 text-right">Rp
                            {{ number_format($transaction->total_price, 0, ',', '.') }}
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap text-sm text-center">
                            <button wire:click="showDetail({{ $transaction->id }})"
                                class="text-blue-600 hover:text-blue-900 font-semibold">Detail</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-3 py-4 text-center text-gray-500">Belum ada transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Detail Modal -->
    @if($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-3xl overflow-hidden">
                <div class="p-4 border-b flex justify-between items-center bg-gray-50">
                    <h3 class="text-lg font-bold">Detail Transaksi #{{ $selectedTransaction->daily_sequence }}</h3>
                    <button wire:click="closeModal"
                        class="text-gray-500 hover:text-gray-700 font-bold text-xl">&times;</button>
                </div>
                <div class="p-6 overflow-y-auto max-h-[70vh]">
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-2 text-left text-xs font-bold text-gray-500 uppercase">Produk</th>
                                <th class="px-3 py-2 text-center text-xs font-bold text-gray-500 uppercase">Qty</th>
                                <th class="px-3 py-2 text-right text-xs font-bold text-gray-500 uppercase">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($selectedTransaction->details as $detail)
                                <tr>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-16 w-16 border rounded overflow-hidden mr-3">
                                                @if($detail->product->image_path)
                                                    <img class="h-16 w-16 object-cover"
                                                        src="{{ asset('storage/' . $detail->product->image_path) }}"
                                                        alt="{{ $detail->product->name }}">
                                                @else
                                                    <div
                                                        class="h-16 w-16 bg-gray-200 flex items-center justify-center text-xs text-gray-500">
                                                        No IMG</div>
                                                @endif
                                            </div>
                                            <div class="text-sm font-medium text-gray-900">{{ $detail->product->name }}</div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center text-sm text-gray-500">
                                        {{ $detail->quantity }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap text-right text-sm font-bold">Rp
                                        {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gray-50">
                            <tr>
                                <td colspan="2" class="px-3 py-2 text-right font-bold">Total</td>
                                <td class="px-3 py-2 text-right font-bold text-blue-600">Rp
                                    {{ number_format($selectedTransaction->total_price, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="p-4 border-t bg-gray-50 text-right">
                    <button wire:click="closeModal"
                        class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Tutup</button>
                </div>
            </div>
        </div>
    @endif
</div>