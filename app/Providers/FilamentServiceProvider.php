<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

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
        Filament::auth(function () {
            return auth()->guard(config('filament.auth.guard'));
        });

        // Modifique o redirecionamento após o login
        Filament::serving(function () {
            if (auth()->check() && auth()->user()->roles->contains('name', 'client')) {
                redirect()->route('home')->send();
            }
        });
    }
}
