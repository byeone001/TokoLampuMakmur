<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Macmur Listrik - Komponen Listrik Terbaik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white">
    <!-- Navigation Bar -->
    <nav class="bg-slate-900 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <img src="{{ asset('img/macmur-listrik.png') }}" alt="Macmur Listrik" class="w-10 h-10">
                <span class="text-xl font-bold">Macmur Listrik</span>
            </div>
            <a href="/login"
                class="bg-amber-400 hover:bg-amber-500 text-slate-900 font-semibold px-6 py-2 rounded-lg transition duration-300">
                Masuk
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section
        class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 text-white min-h-screen flex items-center overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-amber-400 opacity-5 rounded-full blur-3xl -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-400 opacity-5 rounded-full blur-3xl -ml-32 -mb-32"></div>

        <div class="container mx-auto px-6 py-20 relative z-10">
            <div class="max-w-2xl mx-auto text-center">
                <!-- Logo -->
                <div class="mb-8 flex justify-center">
                    <div class="bg-amber-400 bg-opacity-20 backdrop-blur p-6 rounded-2xl">
                        <img src="{{ asset('img/macmur-listrik.png') }}" alt="Macmur Listrik" class="w-32 h-32">
                    </div>
                </div>

                <!-- Main Heading -->
                <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                    Terangi Rumah Anda dengan
                    <span class="text-amber-400"> Komponen Terbaik</span>
                </h1>

                <!-- Subheading -->
                <p class="text-lg md:text-xl text-slate-300 mb-8 max-w-xl mx-auto leading-relaxed">
                    Belanja peralatan listrik berkualitas tinggi dengan harga kompetitif. Garansi resmi dan layanan
                    pelanggan terbaik untuk kepuasan Anda.
                </p>

                <!-- CTA Button -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="/login"
                        class="bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105 shadow-lg">
                        Masuk ke Akun
                    </a>
                    <a href="/register"
                        class="border-2 border-amber-400 hover:bg-amber-400 hover:text-slate-900 text-amber-400 font-bold py-4 px-8 rounded-lg transition duration-300">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">
                    Mengapa Pilih Macmur Listrik?
                </h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                    Kami menyediakan solusi lengkap untuk kebutuhan listrik Anda dengan standar kualitas tertinggi.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group bg-slate-50 p-8 rounded-2xl hover:shadow-xl transition duration-300">
                    <div
                        class="bg-amber-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 group-hover:bg-amber-400 transition duration-300">
                        <svg class="w-8 h-8 text-amber-600 group-hover:text-white" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M4 4a2 2 0 100 4h12a2 2 0 100-4H4zm0 6a2 2 0 100 4h12a2 2 0 100-4H4zm0 6a2 2 0 100 4h12a2 2 0 100-4H4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Grosir & Eceran</h3>
                    <p class="text-slate-600">
                        Kami melayani pembelian dalam jumlah besar dengan harga grosir yang sangat kompetitif dan
                        terjangkau.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="group bg-slate-50 p-8 rounded-2xl hover:shadow-xl transition duration-300">
                    <div
                        class="bg-amber-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 group-hover:bg-amber-400 transition duration-300">
                        <svg class="w-8 h-8 text-amber-600 group-hover:text-white" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Garansi Resmi</h3>
                    <p class="text-slate-600">
                        Semua produk kami dilengkapi garansi resmi dari distributor untuk menjamin kualitas dan
                        keamanan.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="group bg-slate-50 p-8 rounded-2xl hover:shadow-xl transition duration-300">
                    <div
                        class="bg-amber-100 w-16 h-16 rounded-full flex items-center justify-center mb-6 group-hover:bg-amber-400 transition duration-300">
                        <svg class="w-8 h-8 text-amber-600 group-hover:text-white" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Customer Service 24/7</h3>
                    <p class="text-slate-600">
                        Tim dukungan pelanggan kami siap membantu Anda kapan saja untuk memastikan pengalaman belanja
                        terbaik.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-slate-900 to-slate-800 text-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Siap Memulai?</h2>
            <p class="text-lg text-slate-300 mb-8 max-w-2xl mx-auto">
                Daftar sekarang dan dapatkan akses ke ribuan produk listrik berkualitas tinggi dengan harga terbaik.
            </p>
            <a href="/login"
                class="bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold py-3 px-8 rounded-lg transition duration-300 inline-block">
                Masuk ke Akun Anda
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 py-8 border-t border-slate-700">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-6 h-6 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.5 1.5H9.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                        </svg>
                        <span class="font-bold text-white">Macmur Listrik</span>
                    </div>
                    <p class="text-sm">Penyedia komponen listrik berkualitas untuk kebutuhan rumah dan bisnis Anda.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-amber-400 transition">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition">Produk</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-4">Kontak</h4>
                    <ul class="space-y-2 text-sm">
                        <li>Email: info@macmuristrik.com</li>
                        <li>Telepon: (021) 1234-5678</li>
                        <li>Alamat: Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-700 pt-8 text-center text-sm">
                <p>&copy; 2024 Macmur Listrik. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>
</body>

</html>