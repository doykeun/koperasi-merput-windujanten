<?php

namespace App\Providers;

use App\Models\ProfilKoperasi;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        View::composer('*', function ($view) {
            $profilKoperasi = ProfilKoperasi::first();
            $view->with('profilKoperasi', $profilKoperasi);
        });

        // Auto create storage link if not exists (for hosting like Railway)
        if (!File::exists(public_path('storage'))) {
            try {
                File::link(storage_path('app/public'), public_path('storage'));
            } catch (\Exception $e) {
                // If symlink fails (Windows or restricted hosting), create directory and copy
                if (!File::exists(public_path('storage'))) {
                    File::makeDirectory(public_path('storage'));
                }
            }
        }

        // Helper for displaying storage images with fallback (tanpa symlink)
        View::composer('*', function ($view) {
            $view->with('storageImage', function ($path, $default = null) {
                if ($path && Storage::disk('public')->exists($path)) {
                    return route('storage.image', $path);
                }
                return $default;
            });
        });
    }
}
