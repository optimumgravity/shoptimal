<?php
namespace Shoptimal\Cart;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Session\SessionManager;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    //protected $defer = false;

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
        /*$this->app->bind('cart', 'Shoptimal\Cart\Cart');
        $this->app->singleton('cart', function($app) {
            return new \Cart($app('session'));
        });*/
    }

    public function provides()
    {
        return array();
    }
}