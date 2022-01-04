<?php

namespace GiveBlood\Modules\Bank\Database\Migrations;

use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
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
            'banks', function (Blueprint $table): void {
                $table->uuid('id')->unique()->primary();
                $table->string('name');
                $table->string('email');
                $table->string('url');
                $table->string('phone');
                $table->string('location');
                $table->timestamps();
                $table->softDeletes();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->schema->drop('banks');
    }
}
