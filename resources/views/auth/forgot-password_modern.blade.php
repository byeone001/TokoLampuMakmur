<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Macmur Listrik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 min-h-screen flex items-center justify-center p-4">
    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-amber-400 opacity-10 rounded-full blur-3xl -mr-32 -mt-32"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-400 opacity-10 rounded-full blur-3xl -ml-32 -mb-32"></div>

    <!-- Forgot Password Container -->
    <div class="relative z-10 w-full max-w-md">
        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-slate-900 to-slate-800 px-8 py-12 text-center">
                <div class="flex justify-center mb-4">
                    <div class="bg-amber-400 bg-opacity-20 p-3 rounded-xl">
                        <svg class="w-10 h-10 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Reset Password</h1>
                <p class="text-slate-300 text-sm">Kami akan membantu Anda mengatur ulang password</p>
            </div>

            <!-- Form Section -->
            <form class="px-8 py-10 space-y-6" method="POST" action="/forgot-password">
                @csrf

                <!-- Username/Email Input -->
                <div>
                    <label for="username" class="block text-sm font-medium text-slate-700 mb-2">
                        Username atau Email
                    </label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username atau email Anda"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-300 bg-slate-50"
                        required>
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- New Password Input -->
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-2">
                        Password Baru
                    </label>
                    <input type="password" id="password" name="password"
                        placeholder="Masukkan password baru (minimal 6 karakter)"
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
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Ulangi password baru Anda"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-300 bg-slate-50"
                        required>
                </div>

                <!-- Info Message -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <p class="text-sm text-blue-700">
                        <strong>Catatan:</strong> Gunakan password yang kuat dan mudah diingat. Hindari informasi
                        pribadi seperti tanggal lahir atau nama.
                    </p>
                </div>

                <!-- Success Message -->
                @if (session()->has('status'))
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <p class="text-sm text-green-700 font-medium">{{ session('status') }}</p>
                    </div>
                @endif

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <p class="text-sm text-red-700 font-semibold mb-2">Gagal mereset password</p>
                        @foreach ($errors->all() as $error)
                            <p class="text-sm text-red-600">• {{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 text-slate-900 font-bold py-3 px-4 rounded-lg transition duration-300 transform hover:scale-105 shadow-lg">
                    Reset Password
                </button>
            </form>

            <!-- Divider -->
            <div class="px-8 py-4 flex items-center gap-4">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span class="text-xs text-slate-500 font-medium">ATAU</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <!-- Back to Login Section -->
            <div class="px-8 pb-8 text-center">
                <p class="text-sm text-slate-600 mb-4">
                    Ingat password Anda?
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
            <p>Masih mengalami masalah? Hubungi kami di support@macmuristrik.com atau (021) 1234-5678</p>
        </div>
    </div>
</body>

</html>