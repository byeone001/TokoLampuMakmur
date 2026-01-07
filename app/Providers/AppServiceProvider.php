<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // Baris ini sangat penting!

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Jika website dijalankan di server (bukan di laptop/local), 
        // paksa semua link CSS dan JS menggunakan HTTPS.
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    }
}