<?php

namespace GiveBlood\Modules\Badges\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait as LaravelMigrator;
use GiveBlood\Modules\Badges\Database\Migrations\CreateBadgesTable;

class BadgeServiceProvider extends ServiceProvider
{
    use LaravelMigrator;

    public function register()
    {
        $this->registerMigrations();
        $this->registerFactories();
        $this->registerSeeders();
    }

    public function registerMigrations()
    {
        $this->migrations(
            [
                CreateBadgesTable::class
            ]
        );
    }

    public function registerFactories()
    {
        //(new BadgeFactory())->define();
    }

    public function registerSeeders()
    {
        $this->seeders(
            [
            //BadgesSeeder::class,
            ]
        );
    }
}
