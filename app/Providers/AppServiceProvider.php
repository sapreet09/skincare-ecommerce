<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
            if(auth()->check()){
                $cartCount = Cart::where('user_id', auth()->id())->count();
            } else {
                $cartCount = Cart::where('session_id', session()->getId())->count();
            }
            $view->with('cartCount', $cartCount);
        });
    }
}
