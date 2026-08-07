<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Auto-run migrations & seeders on production / Vercel (e.g. Supabase Cloud PostgreSQL)
        try {
            if (\App\Models\Product::count() < 10) {
                \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
                \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'Database\Seeders\ProductSeeder', '--force' => true]);
            }
        } catch (\Throwable $e) {
            // Ignore during setup
        }
    }
}
