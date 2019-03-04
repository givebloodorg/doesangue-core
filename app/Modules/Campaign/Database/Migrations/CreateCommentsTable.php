<?php

namespace GiveBlood\Modules\Campaign\Database\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
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
            'comments', function (Blueprint $table) {
                $table->uuid('id')->unique()->primary();
                $table->string('comment');
                $table->uuid('campaign_id');
                $table->uuid('user_id');
                $table->timestamps();

                // $table->foreign('user_id')->references('id')->on('users')
                //       ->onDelete('cascade');
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
        $this->schema->drop('comments');
    }
}
