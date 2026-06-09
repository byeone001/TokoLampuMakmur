<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Macmur Listrik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
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
                    <div class="bg-amber-400 bg-opacity-20 p-3 rounded-xl">
                        <svg class="w-10 h-10 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.5 1.5H9.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Macmur Listrik</h1>
                <p class="text-slate-300 text-sm">Buat akun baru untuk mulai berbelanja</p>
            </div>

            <!-- Form Section -->
            <form class="px-8 py-10 space-y-4" method="POST" action="/register">
                @csrf

                <!-- Full Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-2">
                        Nama Lengkap
                    </label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-300 bg-slate-50"
                        required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">
                        Email
                    </label>
                    <input type="email" id="email" name="email" placeholder="nama@example.com"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-300 bg-slate-50"
                        required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Username Input -->
                <div>
                    <label for="username" class="block text-sm font-medium text-slate-700 mb-2">
                        Username
                    </label>
                    <input type="text" id="username" name="username" placeholder="username unik Anda"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-300 bg-slate-50"
                        required>
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-2">
                        Password
                    </label>
                    <input type="password" id="password" name="password" placeholder="Minimal 6 karakter"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-300 bg-slate-50"
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
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Ulangi password Anda"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-300 bg-slate-50"
                        required>
                </div>

                <!-- Terms Checkbox -->
                <div class="flex items-start pt-2">
                    <input type="checkbox" id="terms" name="terms"
                        class="w-4 h-4 text-amber-600 bg-slate-100 border-slate-300 rounded focus:ring-2 focus:ring-amber-400 mt-0.5"
                        required>
                    <label for="terms" class="ml-2 text-xs text-slate-600">
                        Saya setuju dengan <a href="#" class="text-amber-600 hover:text-amber-700">Syarat &
                            Ketentuan</a> dan <a href="#" class="text-amber-600 hover:text-amber-700">Kebijakan
                            Privasi</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 text-slate-900 font-bold py-3 px-4 rounded-lg transition duration-300 transform hover:scale-105 shadow-lg mt-6">
                    Daftar Sekarang
                </button>
            </form>

            <!-- Divider -->
            <div class="px-8 py-4 flex items-center gap-4">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span class="text-xs text-slate-500 font-medium">ATAU</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <!-- Sign In Link Section -->
            <div class="px-8 pb-8 text-center">
                <p class="text-sm text-slate-600 mb-4">
                    Sudah punya akun?
                    <a href="/login" class="font-semibold text-amber-600 hover:text-amber-700 transition">
                        Masuk di sini
                    </a>
                </p>
                <a href="/"
                    class="inline-block text-sm text-slate-500 hover:text-slate-700 transition border-t border-slate-200 pt-4">
                    ← Kembali ke halaman utama
                </a>
            </div>
        </div>

        <!-- Additional Help Text -->
        <div class="mt-6 text-center text-slate-300 text-xs">
            <p>Butuh bantuan? Hubungi kami di support@macmuristrik.com</p>
        </div>
    </div>
</body>

</html>