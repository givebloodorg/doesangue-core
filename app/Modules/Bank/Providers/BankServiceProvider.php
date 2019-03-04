<?php

namespace GiveBlood\Modules\Bank\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait as LaravelMigrator;
use GiveBlood\Modules\Bank\Database\Migrations\CreateBanksTable;


class BankServiceProvider extends ServiceProvider
{
    use LaravelMigrator;

    public function register()
    {
        $this->registerMigrations();
        $this->registerFactories();
        //$this->registerSeeders();
    }

    public function registerMigrations()
    {
        $this->migrations(
            [
            CreateBanksTable::class
            ]
        );
    }

    public function registerFactories()
    {
        //
    }

    public function registerSeeders()
    {
        //
    }
}
