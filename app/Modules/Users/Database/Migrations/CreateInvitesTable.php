<?php

namespace GiveBlood\Modules\Users\Database\Migrations;

use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitesTable extends Migration
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
            'invites', function (Blueprint $table): void {
                $table->increments('id');
                $table->string('invite_code')->unique();
                $table->uuid('user_id');
                $table->softDeletes();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->schema->drop('invites');
    }
}
