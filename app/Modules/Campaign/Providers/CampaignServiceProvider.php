<?php

namespace GiveBlood\Modules\Campaign\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait as LaravelMigrator;

use GiveBlood\Modules\Campaign\Database\Migrations\CreateCampaignsTable;
use GiveBlood\Modules\Campaign\Database\Migrations\CreateCommentsTable;
use GiveBlood\Modules\Campaign\Database\Seeders\CampaignsSeeder;
use GiveBlood\Modules\Campaign\Database\Factories\CampaignFactory;


class CampaignServiceProvider extends ServiceProvider
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
            CreateCampaignsTable::class,
            CreateCommentsTable::class
            ]
        );
    }

    public function registerFactories(): void
    {
       //  (new CampaignFactory())->definition();
    }

    public function registerSeeders(): void
    {
        $this->seeders(
            [
            CampaignsSeeder::class,
            ]
        );
    }
}
