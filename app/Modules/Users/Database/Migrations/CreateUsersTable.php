<?php

namespace GiveBlood\Modules\Users\Database\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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
            'users', function (Blueprint $table) {
                $table->uuid('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('username')->unique();
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('phone', 15);
                $table->text('bio')->nullable();
                $table->date('birthdate')->nullable();
                $table->integer('country_id')->unsigned();
                $table->integer('blood_type_id')->unsigned();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();

                $table->foreign('country_id')->references('id')->on('countries')->onCascade('delete');
                $table->foreign('blood_type_id')->references('id')->on('blood_types')->onCascade('delete');
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
        $this->schema->drop('users');
    }
}
