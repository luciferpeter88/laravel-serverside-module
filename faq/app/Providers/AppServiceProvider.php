<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        
        Blade::component('components.head.head-tag', 'head-tag');
        Blade::component('components.dashboard.sidebar', 'dash-sidebar');
        Blade::component('components.dashboard.header1', 'dash-header1');
        Blade::component('components.dashboard.header2', 'dash-header2');
        Blade::component('components.svg.edit', 'svg-edit');

       
    }
}
