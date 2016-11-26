<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDonorsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table(
            'donors', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('blood_type_id')->references('id')->on('blood_types');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table(
            'donors', function (Blueprint $table) {
                $table->dropForeign('donors_user_id_foreign');
                $table->dropForeign('donors_blood_type_id_foreign');
            }
        );
    }
}
