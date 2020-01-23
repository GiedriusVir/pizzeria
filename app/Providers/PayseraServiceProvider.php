<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Paysera;

class PayseraServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->singleton(Paysera::class, function () {
            // $config = [
            //     'prohectid' => ,
            //     'sign_password' => '',
            //     'accepturl' => route('accept'),
            //     'cancelurl' => route('cancel'),
            //     'callbackurl' => route('callback'),
            // ];
            return new Paysera($config);
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
