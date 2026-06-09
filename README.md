<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Toko Lampu Makmur

Aplikasi web kasir dan manajemen produk untuk Toko Lampu Makmur berbasis Laravel + Livewire.

## Fitur utama

- POS / transaksi penjualan
- Manajemen produk untuk admin
- Laporan transaksi untuk kasir dan admin
- Kelola data karyawan dan profil pengguna

## Jalankan aplikasi

1. composer install
2. npm install
3. cp .env.example .env
4. php artisan key:generate
5. php artisan migrate
6. npm run dev

## Struktur penting

- app/Livewire: halaman interaktif utama
- app/Services dan app/Repositories: logika bisnis dan akses data
- resources/views/livewire: tampilan Blade untuk setiap halaman Livewire

## Catatan pembersihan

File default Laravel yang tidak dipakai untuk alur aplikasi ini telah dibersihkan agar proyek lebih fokus dan mudah dirawat.
