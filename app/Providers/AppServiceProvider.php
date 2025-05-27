<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;




class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Paginator::useBootstrap(); // Ini agar {{ $categories->links() }} pakai Bootstrap style
    }
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

}
