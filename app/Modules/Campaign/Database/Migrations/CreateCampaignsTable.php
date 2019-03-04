<?php

namespace GiveBlood\Modules\Campaign\Database\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
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
            'campaigns', function (Blueprint $table) {
                $table->uuid('id')->unique()->primary();
                $table->string('title');
                $table->text('description');
                $table->string('image')->nullable();
                $table->dateTimeTz('expires');
                $table->uuid('user_id');
                $table->string('slug');
                $table->timestamps();
                $table->softDeletes();

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
        $this->schema->drop('campaigns');
    }
}
