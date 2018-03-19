<?php

namespace DoeSangue\Providers;

use DoeSangue\Models\User;
use DoeSangue\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //  User::observe(UserObserver::class);

        // Extend the Validator class.
        // To check the user age (minimum: 16)
        Validator::extend(
            'olderThan', function($attributes, $value, $parameters) {
                $minAge = (!empty($parameters)) ? (int) $parameters[ 0 ] : 16;
                return \Carbon\Carbon::now()->diff(new \Carbon\Carbon($value))->y >= $minAge;
            }
        );
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
