<?php

namespace GiveBlood\Modules\Users\Database\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationRequestsTable extends Migration
{
    /**
     * @var \Illuminate\Database\Schema\Builder
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
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create(
            'invitation_requests', function (Blueprint $table) {
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
     *
     * @return void
     */
    public function down()
    {
        $this->schema->drop('invitation_requests');
    }
}
