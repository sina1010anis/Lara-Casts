<?php

namespace App\Providers;

use App\Buy\Billing\Buy;
use App\Buy\Billing\Paypal;
use App\Buy\Billing\ZarinPal;
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
        $this->app->singleton(Buy::class,function (){
            return new Paypal('Paypal v1.2');
        });
        resolve(View::class)->View();
        Schema::defaultStringLength(191);
        Str::mixin(new MethodsStr());
    }
}
