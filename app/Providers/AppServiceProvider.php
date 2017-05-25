<?php

namespace DoeSangue\Providers;

use DoeSangue\Models\User;
use DoeSangue\Models\Campaign;
use DoeSangue\Observers\UserObserver;
use DoeSangue\Observers\CampaignObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Campaign::observe(CampaignObserver::class);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
