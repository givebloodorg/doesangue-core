<?php

namespace GiveBlood\Modules\Users\Database\Migrations;

use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationRequestsTable extends Migration
{
    /**
     * @var Builder
     */
    protected $schema;

    /**
     * Migration constructor.
     */
    public function __construct()
    {
        $this->schema = app('db')->connection()->getSchemaBuilder();
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->schema->create(
            'invitation_requests', function (Blueprint $table): void {
                $table->increments('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('guest_email')->unique();
                $table->integer('country_id')->unsigned();
                $table->string('token')->unique();
                $table->timestamps();

                $table->foreign('country_id')->references('id')
                    ->on('countries');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->schema->drop('invitation_requests');
    }
}
