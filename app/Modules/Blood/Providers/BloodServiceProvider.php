<?php

namespace GiveBlood\Modules\Blood\Providers;

use Illuminate\Support\ServiceProvider;

use Migrator\MigratorTrait as LaravelMigrator;

use GiveBlood\Modules\Blood\Database\Migrations\CreateBloodTypesTable;
use GiveBlood\Modules\Blood\Database\Factories\BloodTypeFactory;
use  GiveBlood\Modules\Blood\Database\Seeders\BloodTypeSeeder;


class BloodServiceProvider extends ServiceProvider
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
            CreateBloodTypesTable::class
            ]
        );
    }

    public function registerFactories(): void
    {
       // (new BloodTypeFactory())->definition();
    }

    public function registerSeeders(): void
    {
        $this->seeders(
            [
                BloodTypeSeeder::class
            ]
        );
    }
}
