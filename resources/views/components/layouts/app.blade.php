<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Lampu Makmur POS' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen">
        <!-- Navigation -->
        @auth
            <nav class="bg-blue-600 p-4 text-white shadow-md">
                <div class="container mx-auto flex justify-between items-center">
                    <a href="/" class="text-xl font-bold">Lampu Makmur POS</a>
                    <div class="flex items-center gap-4">
                        @if(auth()->user()->role === 'admin')
                            <a href="/admin/products" class="px-3 hover:underline">Admin</a>
                            <a href="/admin/reports" class="px-3 hover:underline">Laporan</a>
                            <a href="/admin/employees" class="px-3 hover:underline">Karyawan</a>
                        @else
                            <a href="/my-reports" class="px-3 hover:underline">Laporan</a>
                        @endif
                        <a href="/pos" class="px-3 hover:underline">Kasir</a>

                        <div class="ml-4 border-l pl-4 flex items-center gap-3">
                            <a href="/profile" class="text-sm hover:underline font-semibold">Hi,
                                {{ auth()->user()->username }}</a>
                            <a href="/logout" class="bg-red-500 px-3 py-1 rounded hover:bg-red-600 text-sm">Logout</a>
                        </div>
                    </div>
                </div>
            </nav>
        @endauth

        <!-- Page Content -->
        <main class="container mx-auto p-4">
            {{ $slot }}
        </main>
    </div>
</body>

</html>