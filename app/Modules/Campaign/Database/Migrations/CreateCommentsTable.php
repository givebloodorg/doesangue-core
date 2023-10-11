<?php

namespace GiveBlood\Modules\Campaign\Database\Migrations;

use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * @var Builder
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
     */
    public function up(): void
    {
        $this->schema->create(
            'comments', function (Blueprint $table): void {
                $table->uuid('id')->unique()->primary();
                $table->string('comment');
                $table->uuid('campaign_id');
                $table->uuid('user_id');
                $table->softDeletes();
                $table->timestamps();

                // $table->foreign('user_id')->references('id')->on('users')
                //       ->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->schema->drop('comments');
    }
}
