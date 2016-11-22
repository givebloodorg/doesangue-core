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
                $table->string('name');
<<<<<<< 4da80d6577e9a5832dd03c1d377b4f411d154433
                $table->string('username')->unique();
||||||| merged common ancestors
                $table->string('username', 20);
=======
                $table->string('username', 20)->unique();
>>>>>>> Adicionando FoundationCSS para o frontend
                $table->string('email')->unique();
                $table->string('password');
                $table->string('phone', 15)->nullable();
                $table->longText('bio')->nullable();
                $table->rememberToken();
                $table->timestamps();
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
