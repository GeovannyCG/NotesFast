<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; //Se importa el modulo de paginacion 

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
        //Se inidica que el metodo de paginacion sera por medio de Bootstrap ya que por defecto viene tailwind
        Paginator::useBootstrapFive();
    }
}
