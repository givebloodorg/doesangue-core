<?php

namespace Tests;

use Illuminate\Foundation\Application;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        $this->afterApplicationCreated(
            function () {
                /*$this->artisan("migrate", ["--path" => "\"app/Modules/Badges/Database/Migrations/CreateBadgesTable.php , ".
        "app/Modules/Bank/Database/Migrations/CreateBanksTable.php , ".
        "app/Modules/Blood/Database/Migrations/CreateBloodTypesTable.php , ".
        "app/Modules/Campaign/Database/Migrations/CreateCampaignsTable.php , ".
        "app/Modules/Campaign/Database/Migrations/CreateCommentsTable.php , ".
        "app/Modules/Users/Database/Migrations/CreateCountriesTable.php , ".
        "app/Modules/Users/Database/Migrations/CreateInvitationRequestsTable.php , ".
        "app/Modules/Users/Database/Migrations/CreateInvitesTable.php , ".
        "app/Modules/Users/Database/Migrations/CreatePasswordResetsTable.php , ".
        "app/Modules/Users/Database/Migrations/CreateUsersTable.php\""]);
    */

                $this->artisan("migrate", ['--path' => ""]);
                $this->artisan("migrator", []);
            }

        );
        return $app;
    }
}
