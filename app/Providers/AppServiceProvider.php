<?php

namespace App\Providers;

use App\Mix\MethodsStr;
use App\View\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
     * @throws \Exception
     */
    public function boot()
    {
        resolve(View::class)->View();
        Str::mixin(new MethodsStr());
        Schema::defaultStringLength(191);
    }
}
