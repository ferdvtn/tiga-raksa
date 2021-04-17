<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->string('rm_branch_id', 4)->nullable(false);
            $table->string('rm_rep_id', 10)->nullable(false)->unique();
            $table->string('rm_name', 255)->nullable(false);
            $table->string('rm_current_position', 4)->nullable(false);
            $table->string('rm_manager_id', 10)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
