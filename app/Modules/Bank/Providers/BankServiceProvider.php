<?php

namespace GiveBlood\Modules\Bank\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait as LaravelMigrator;

use GiveBlood\Modules\Bank\Database\Migrations\CreateBanksTable;
use GiveBlood\Modules\Bank\Database\Factories\BankFactory;
use GiveBlood\Modules\Bank\Database\Seeders\BanksSeeder;


class BankServiceProvider extends ServiceProvider
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
            CreateBanksTable::class
            ]
        );
    }

    public function registerFactories(): void
    {
        (new BankFactory())->define();
    }

    public function registerSeeders(): void
    {
        $this->seeders(
            [
                BanksSeeder::class
            ]
        );
    }
}
