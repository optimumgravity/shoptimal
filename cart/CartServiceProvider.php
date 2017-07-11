<?php
namespace Shoptimal\Cart;

use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('cart', function()
        {
            $instanceName = 'cart';
            return new Cart(
                $instanceName
            );
        });
    }

    public function provides()
    {
        return array();
    }
}