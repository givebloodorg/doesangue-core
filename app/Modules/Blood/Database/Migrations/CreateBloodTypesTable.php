<?php

namespace GiveBlood\Modules\Blood\Database\Migrations;

use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodTypesTable extends Migration
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
            'blood_types', function (Blueprint $table): void {
                $table->uuid('id')->unique()->primary();
                $table->string('description', 20);
                $table->string('code', 10);
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->schema->drop('blood_types');
    }
}
