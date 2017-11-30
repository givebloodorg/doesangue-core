<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodTypesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(
            'blood_types', function (Blueprint $table) {
                $table->increments('bid');
                $table->uuid('id')->unique();
                $table->string('description', 20);
                $table->string('code', 10);
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('blood_types');
    }
}
