<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitation_requests', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('guest_email')->unique();
            $table->uuid('country_id');
            $table->foreign('country_id')->references('id')
            ->on('countries');
            $table->string('token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitation_requests');
    }
}
