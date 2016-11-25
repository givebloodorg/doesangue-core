<?php

/*
 * DoeSangue.me
 *   Projeto Filantrópico para pesquisa e conexão de doadores voluntários.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->primary('user_id');
            $table->integer('blood_type_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('donors');
    }
}
