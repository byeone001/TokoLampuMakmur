<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Manajemen Karyawan (Kasir)</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Form Section -->
        <div class="md:col-span-1 border-r pr-6">
            <h3 class="text-lg font-semibold mb-3">{{ $isEdit ? 'Edit Karyawan' : 'Tambah Karyawan' }}</h3>
            <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" wire:model="name"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border p-2">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" wire:model="username"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border p-2">
                    @error('username') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select wire:model="gender"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border p-2">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Password
                        {{ $isEdit ? '(Isi jika ingin mengubah)' : '' }}</label>
                    <input type="password" wire:model="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border p-2">
                    @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center gap-2 mt-4">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 w-full">
                        {{ $isEdit ? 'Simpan Perubahan' : 'Tambah Karyawan' }}
                    </button>
                    @if($isEdit)
                        <button type="button" wire:click="cancel"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</button>
                    @endif
                </div>
            </form>
        </div>

        <!-- List Section & Stats -->
        <div class="md:col-span-2">
            <h3 class="text-lg font-semibold mb-3">Daftar Kasir & Omzet</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama / Username</th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gender</th>
                            <th
                                class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total Transaksi</th>
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total Omzet</th>
                            <th
                                class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($employees as $emp)
                            <tr>
                                <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-900">
                                    <div class="font-bold">{{ $emp->name }}</div>
                                    <div class="text-xs text-gray-500">@ {{ $emp->username }}</div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500">{{ $emp->gender }}</td>
                                <td class="px-3 py-2 whitespace-nowrap text-sm text-center">{{ $emp->transactions_count }}
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap text-sm text-right text-green-600 font-bold">
                                    Rp {{ number_format($emp->transactions_sum_total_price ?? 0, 0, ',', '.') }}
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap text-sm text-center">
                                    <button wire:click="edit({{ $emp->id }})"
                                        class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</button>
                                    <button wire:click="delete({{ $emp->id }})" class="text-red-600 hover:text-red-900"
                                        onclick="confirm('Yakin ingin menghapus karyawan ini?') || event.stopImmediatePropagation()">Hapus</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-3 py-4 text-center text-gray-500">Belum ada karyawan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>