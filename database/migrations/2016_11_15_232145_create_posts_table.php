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
                $table->string('title', 200);
                $table->text('content');
                $table->string('image');
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade');
                $table->dateTimeTz('created_at')->nullable();
                $table->timestamp('updated_at');
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
