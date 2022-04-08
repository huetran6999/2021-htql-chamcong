<?php

namespace App\Providers;

use App\Models\Department;
use App\Models\Enterprise;
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
        //
        $enterprises = Enterprise::all();
        View::share('enterprises', $enterprises);

        $deps = Department::all();
        View::share('deps', $deps);
    }
}
