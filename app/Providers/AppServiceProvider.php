<?php

namespace App\Providers;

use GuzzleHttp\Client;
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
        // $baseUrl = env('API_ENDPOINT');
        $this->app->singleton('GuzzleHttp\Client', function(){
            return new Client([
                'base_uri' => 'http://BMR99SP17TMF9H3BBJMGLG2UQJ3XAANQ@testprestashop.test'
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
