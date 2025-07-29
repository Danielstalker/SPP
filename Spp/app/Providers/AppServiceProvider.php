<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Aquí puedes registrar bindings o servicios
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    Filament::serving(function () {
        Filament::registerRenderHook(
            'head.start', // <-- más confiable que 'styles.end'
            fn () => '<link rel="stylesheet" href="' . asset('css/filament/dashboard.css') . '">'
        );
    });
}
}
