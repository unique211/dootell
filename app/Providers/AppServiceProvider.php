<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Routing\UrlGenerator;   //change by vishal

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
    public function boot(UrlGenerator $url)
    {
     \URL::forceRootUrl(\Config::get('app.url'));    
    if (str_contains(\Config::get('app.url'), 'https://')) {
        \URL::forceScheme('https');
    }
    }
}
