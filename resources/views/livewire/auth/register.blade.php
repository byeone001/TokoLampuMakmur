<div
    class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 min-h-screen flex items-center justify-center p-4">
    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-amber-400 opacity-10 rounded-full blur-3xl -mr-32 -mt-32"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-400 opacity-10 rounded-full blur-3xl -ml-32 -mb-32"></div>

    <!-- Register Container -->
    <div class="relative z-10 w-full max-w-md">
        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-slate-900 to-slate-800 px-8 py-12 text-center">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('img/macmur-logo.svg') }}" alt="Macmur Listrik" class="w-16 h-16">
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Daftar Kasir Baru</h1>
                <p class="text-slate-300 text-sm">Bergabunglah sebagai kasir Macmur Listrik</p>
            </div>

            <!-- Form Section -->
            <form class="px-8 py-10 space-y-5" wire:submit.prevent="register">
                <!-- Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-2">
                        Nama Lengkap
                    </label>
                    <input type="text" id="name" wire:model="name" placeholder="Masukkan nama lengkap"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-300 bg-slate-50"
                        autofocus>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Username Input -->
                <div>
                    <label for="username" class="block text-sm font-medium text-slate-700 mb-2">
                        Username
                    </label>
                    <input type="text" id="username" wire:model="username" placeholder="Username unik untuk login"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-300 bg-slate-50"
                        required>
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gender Select -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-slate-700 mb-2">
                        Gender
                    </label>
                    <select id="gender" wire:model="gender"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-300 bg-slate-50">
                        <option value="">-- Pilih Gender --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('gender')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-2">
                        Password
                    </label>
                    <input type="password" id="password" wire:model="password"
                        placeholder="Password (minimal 6 karakter)"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-300 bg-slate-50"
                        required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password Input -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">
                        Konfirmasi Password
                    </label>
                    <input type="password" id="password_confirmation" wire:model="password_confirmation"
                        placeholder="Ulangi password Anda"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-300 bg-slate-50"
                        required>
                </div>

                <!-- Terms Checkbox -->
                <div class="flex items-center">
                    <input type="checkbox" id="terms"
                        class="w-4 h-4 text-amber-400 rounded focus:ring-2 focus:ring-amber-400" required>
                    <label for="terms" class="ml-3 text-sm text-slate-600">
                        Saya setuju dengan Syarat & Ketentuan
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 text-slate-900 font-bold py-3 px-4 rounded-lg transition duration-300 transform hover:scale-105 shadow-lg">
                    Daftar Akun
                </button>
            </form>

            <!-- Divider -->
            <div class="px-8 py-4 flex items-center gap-4">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span class="text-xs text-slate-500 font-medium">ATAU</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <!-- Login Link -->
            <div class="px-8 pb-8 text-center">
                <p class="text-sm text-slate-600">
                    Sudah punya akun?
                    <a href="/login" class="font-semibold text-amber-600 hover:text-amber-700 transition">
                        Masuk di sini
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>