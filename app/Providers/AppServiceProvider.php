<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Aquí puedes registrar servicios en el contenedor de servicios.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Aquí puedes realizar acciones durante el arranque de la aplicación.

        // Ejemplo: agregar una directiva Blade personalizada
        Blade::directive('example', function ($expression) {
            return "<?php echo 'This is an example: ' . $expression; ?>";
        });
    }
}

