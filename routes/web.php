<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\AdminProduct;
use App\Livewire\PosComponent;
use App\Livewire\Auth\Login;
use App\Livewire\AdminReports;
use App\Http\Middleware\IsAdmin;

Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/register', App\Livewire\Auth\Register::class)->middleware('guest');

Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect('/pos');
    });

    Route::get('/pos', PosComponent::class);
    Route::get('/profile', App\Livewire\UserProfile::class);
    Route::get('/my-reports', App\Livewire\CashierReports::class);

    Route::middleware(IsAdmin::class)->prefix('admin')->group(function () {
        Route::get('/products', AdminProduct::class);
        Route::get('/reports', AdminReports::class);
        Route::get('/employees', App\Livewire\AdminEmployee::class);
    });
});
