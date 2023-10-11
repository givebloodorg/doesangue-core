<?php

namespace GiveBlood\Modules\Badges\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait as LaravelMigrator;
use GiveBlood\Modules\Badges\Database\Migrations\CreateBadgesTable;

class BadgeServiceProvider extends ServiceProvider
{
    use LaravelMigrator;

    public function register(): void
    {
        $this->registerMigrations();
        $this->registerFactories();
        $this->registerSeeders();
    }

    public function registerMigrations(): void
    {
        $this->migrations(
            [
                CreateBadgesTable::class
            ]
        );
    }

    public function registerFactories(): void
    {
       // (new BadgeFactory())->definition();
    }

    public function registerSeeders(): void
    {
        $this->seeders(
            [
            //BadgesSeeder::class,
            ]
        );
    }
}
