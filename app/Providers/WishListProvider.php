<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Darryldecode\Cart\Cart;

class WishListProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('wishlist', function($app)
        {
            $storage = new DBStorage();
            $events = $app['events'];
            $instanceName = 'cart_2';
            $session_key = '88uuiioo99888';
            return new Cart(
                $storage,
                $events,
                $instanceName,
                $session_key,
                config('shopping_cart')
            );
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
