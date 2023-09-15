<?php

namespace GiveBlood\Units\Core\Providers;

use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

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
        //  User::observe(UserObserver::class);

        // Extend the Validator class.
        // To check the user age (minimum: 16)
        Validator::extend(
            'olderThan', function ($attributes, $value, $parameters): bool {
                $minAge = (empty($parameters)) ? 16 : (int) $parameters[ 0 ];
                return Carbon::now()->diff(new Carbon($value))->y >= $minAge;
            }
        );
    }
}
