<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //Blade directives
        Blade::directive('role', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})): ?>"; //return this if statement inside php tag
        });

        Blade::directive('endrole', function ($role) {
            return "<?php endif; ?>"; //return this endif statement inside php tag
        });

        Blade::directive('perm', function ($permission) {
            return "<?php if(auth()->check() && auth()->user()->hasPerm({$permission})): ?>"; //return this if statement inside php tag
        });

        Blade::directive('endperm', function ($role) {
            return "<?php endif; ?>"; //return this endif statement inside php tag
        });
    }
}
