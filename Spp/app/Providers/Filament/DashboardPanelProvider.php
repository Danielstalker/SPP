<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

// ¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡ NUEVAS IMPORTACIONES NECESARIAS !!!!!!!!!!!!!!!!!!!!!
use Filament\Support\Assets\Css; // Para registrar archivos CSS
use Filament\Support\Assets\Js;  // Por si acaso necesitas JS más tarde
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

class DashboardPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
        ->id('dashboard')
        ->path('dashboard')

        // ✅ Solo esta es necesaria
        ->authMiddleware([
            Authenticate::class,
        ])
            ->colors([
                // ¡Asegúrate de que tus colores estén con la sintaxis correcta 'rgb(R,G,B)' o HEX!
                'primary' => Color::rgb('rgb(57, 255, 20)'),   // Verde neón Ferxxo
                'secondary' => Color::rgb('rgb(255, 0, 144)'), // Magenta vibrante Ferxxo
                'danger' => Color::Red,
                'info' => Color::Blue,
                'success' => Color::Green,
                'warning' => Color::Amber,
            ])
            // ¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡ ESTA ES LA SINTAXIS CORRECTA PARA ASSETS EN FILAMENT 3 !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            // Usamos Css::make() para registrar el archivo CSS.
            // Le damos un 'id' único y la 'path' al archivo CSS.
            ->assets([
               Css::make('custom-dashboard-styles', asset('css/dashboard.css')), // <-- ¡ESTO ES LO QUE NECESITAS!
                
            ], 'app') // El segundo argumento 'app' es el "paquete" y es importante.
            
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ]);
           
    }
}