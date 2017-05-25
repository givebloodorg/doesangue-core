<?php

namespace DoeSangue\Providers;

use DoeSangue\Models\User;
use DoeSangue\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
