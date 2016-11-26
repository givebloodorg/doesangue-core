<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(
            'posts', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->string('title', 200);
                $table->text('content');
                $table->string('image');
                $table->dateTimeTz('created_at');
                $table->timestampTz('updated_at');
                $table->softDeletes();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
