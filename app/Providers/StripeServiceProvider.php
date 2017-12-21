<?php

namespace App\Providers;

use Stripe\Stripe;
use Laravel\Cashier\Cashier;
use Illuminate\Support\ServiceProvider;

class StripeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        Cashier::useCurrency('usd','$');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
