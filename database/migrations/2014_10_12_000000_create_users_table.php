<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(
            'users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('username', 20)->unique();
                $table->string('email')->unique();
                $table->string('password');
                $table->string('phone', 15)->nullable();
                $table->date('birthdate');
                $table->longText('bio')->nullable();
                $table->integer('blood_type_id')->unsigned()->nullable();
              //  $table->foreign('blood_type_id')->references('id')->on('blood_types');
                $table->enum('status', ['active', 'inactive'])->default('inactive');
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
