<?php

namespace App\Providers;

use App\Employee;
use App\Http\View\Composers\PositionsComposer;
use App\Observers\EmployeeObserver;
use App\Position;
use Illuminate\Support\Facades\View;
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

        Employee::observe(EmployeeObserver::class);

        // Option 1 - Every single view
        //View::share('positions', Position::all());

        // Option 2 - Granular views with wildcards
//        View::composer(['admin.employee.create','admin.employee.edit'], function ($view){
//            $view->with(['positions'=>Position::all()]);
//        });

        // Option 3  - Dedicated Class
        View::composer('partials.positions.*', PositionsComposer::class);
    }



}
