<?php

namespace GiveBlood\Modules\Users\Database\Migrations;

use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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
            'users', function (Blueprint $table): void {
                $table->uuid('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('username')->unique();
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('phone', 15);
                $table->text('bio')->nullable();
                $table->date('birthdate')->nullable();
                $table->uuid('country_id');
                $table->uuid('blood_type_id');
                $table->string('password');
                $table->rememberToken();
                $table->softDeletes();
                $table->timestamps();

                //$table->foreign('country_id')->references('id')->on('countries')->onCascade('delete');
                //$table->foreign('blood_type_id')->references('id')->on('blood_types')->onCascade('delete');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->schema->drop('users');
    }
}
