<div class="flex items-center justify-center min-h-[80vh]">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-center mb-2">Reset Password</h2>
        <p class="text-gray-600 text-sm text-center mb-6">Masukkan username atau email akun Anda, lalu buat password
            baru.</p>

        @if (session()->has('status'))
            <div class="mb-4 rounded bg-green-100 border border-green-300 px-4 py-3 text-sm text-green-700">
                {{ session('status') }}
            </div>
        @endif

        <form wire:submit.prevent="resetPassword">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Username / Email</label>
                <input wire:model="username" type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="contoh: admin123 atau admin@gmail.com" autofocus>
                @error('username') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password Baru</label>
                <input wire:model="password" type="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password</label>
                <input wire:model="password_confirmation" type="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Reset Password
            </button>

            <div class="mt-4 text-center">
                <a href="/login" class="text-blue-500 text-sm hover:underline">Kembali ke login</a>
            </div>
        </form>
    </div>
</div>