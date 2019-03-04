<?php

namespace GiveBlood\Units\Core\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //  User::observe(UserObserver::class);

        // Extend the Validator class.
        // To check the user age (minimum: 16)
        Validator::extend(
            'olderThan', function ($attributes, $value, $parameters) {
                $minAge = (!empty($parameters)) ? (int) $parameters[ 0 ] : 16;
                return \Carbon\Carbon::now()->diff(new \Carbon\Carbon($value))->y >= $minAge;
            }
        );
    }
}
