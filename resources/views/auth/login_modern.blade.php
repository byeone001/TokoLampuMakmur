<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Macmur Listrik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 min-h-screen flex items-center justify-center p-4">
    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-amber-400 opacity-10 rounded-full blur-3xl -mr-32 -mt-32"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-400 opacity-10 rounded-full blur-3xl -ml-32 -mb-32"></div>

    <!-- Login Container -->
    <div class="relative z-10 w-full max-w-md">
        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-slate-900 to-slate-800 px-8 py-12 text-center">
                <div class="flex justify-center mb-4">
                    <div class="bg-amber-400 bg-opacity-20 p-3 rounded-xl">
                        <svg class="w-10 h-10 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.5 1.5H9.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm0 4H9.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 0h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm6 4H9.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 0h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm6 4H9.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 0h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Macmur Listrik</h1>
                <p class="text-slate-300 text-sm">Masuk ke akun Anda untuk melanjutkan</p>
            </div>

            <!-- Form Section -->
            <form class="px-8 py-10 space-y-6" method="POST" action="/login">
                @csrf

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">
                        Email atau Username
                    </label>
                    <input type="text" id="email" name="email" placeholder="nama@example.com atau username"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-300 bg-slate-50"
                        required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-sm font-medium text-slate-700">
                            Password
                        </label>
                        <a href="/forgot-password"
                            class="text-xs text-amber-600 hover:text-amber-700 font-medium transition">
                            Lupa password?
                        </a>
                    </div>
                    <input type="password" id="password" name="password" placeholder="Masukkan password Anda"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-300 bg-slate-50"
                        required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember"
                        class="w-4 h-4 text-amber-600 bg-slate-100 border-slate-300 rounded focus:ring-2 focus:ring-amber-400">
                    <label for="remember" class="ml-2 text-sm text-slate-600 cursor-pointer">
                        Ingat saya di perangkat ini
                    </label>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                        <p class="font-semibold mb-1">Gagal masuk</p>
                        <p>Username atau password tidak sesuai. Silakan coba lagi.</p>
                    </div>
                @endif

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 text-slate-900 font-bold py-3 px-4 rounded-lg transition duration-300 transform hover:scale-105 shadow-lg">
                    Masuk ke Akun
                </button>
            </form>

            <!-- Divider -->
            <div class="px-8 py-4 flex items-center gap-4">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span class="text-xs text-slate-500 font-medium">ATAU</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <!-- Sign Up Link Section -->
            <div class="px-8 pb-8 text-center">
                <p class="text-sm text-slate-600 mb-4">
                    Belum punya akun?
                    <a href="/register" class="font-semibold text-amber-600 hover:text-amber-700 transition">
                        Daftar di sini
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