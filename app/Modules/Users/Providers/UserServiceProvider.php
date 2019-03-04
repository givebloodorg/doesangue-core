<?php

namespace GiveBlood\Modules\Users\Providers;

use Illuminate\Support\ServiceProvider;
use Migrator\MigratorTrait as LaravelMigrator;

use GiveBlood\Modules\Users\Database\Migrations\CreateCountriesTable;
use GiveBlood\Modules\Users\Database\Migrations\CreateUsersTable;
use GiveBlood\Modules\Users\Database\Migrations\CreatePasswordResetsTable;
use GiveBlood\Modules\Users\Database\Migrations\CreateInvitesTable;
use GiveBlood\Modules\Users\Database\Migrations\CreateInvitationRequestsTable;
use GiveBlood\Modules\Users\Database\Seeders\CountriesSeeder;
use GiveBlood\Modules\Users\Database\Seeders\UsersSeeder;
use GiveBlood\Modules\Users\Database\Seeders\InvitesSeeder;
use GiveBlood\Modules\Users\UserFactory;


class UserServiceProvider extends ServiceProvider
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
            CreateCountriesTable::class,
            CreateUsersTable::class,
            CreatePasswordResetsTable::class,
            CreateInvitesTable::class,
            CreateInvitationRequestsTable::class
            ]
        );
    }

    public function registerFactories()
    {
        (new UserFactory())->define();
    }

    public function registerSeeders()
    {
        $this->seeders(
            [
            CountriesSeeder::class,
            UsersSeeder::class,
            //InvitesSeeder::class,
            ]
        );
    }
}
