<?php

namespace GiveBlood\Modules\Blood\Providers;

use Illuminate\Support\ServiceProvider;

use Migrator\MigratorTrait as LaravelMigrator;

use GiveBlood\Modules\Blood\Database\Migrations\CreateBloodTypesTable;
use GiveBlood\Modules\Blood\BloodTypeFactory;


class BloodServiceProvider extends ServiceProvider
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
            CreateBloodTypesTable::class
            ]
        );
    }

    public function registerFactories()
    {
        (new BloodTypeFactory())->define();
    }

    public function registerSeeders()
    {
        //
    }
}
