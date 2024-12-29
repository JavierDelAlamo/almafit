<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerRenderHook('branding', function () {
                return '<div class="flex items-center space-x-2">
                            <img src="' . asset('/logo.gif') . '" alt="Logo" class="h-8 w-auto">
                            <span class="font-bold text-lg">AlmaFit</span>
                        </div>';
            });
        });
    }
}
