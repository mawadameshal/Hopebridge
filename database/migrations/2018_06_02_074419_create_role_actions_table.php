<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_actions', function (Blueprint $table) {

            $table->integer('action_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->primary(['action_id', 'role_id']);

            $table->foreign('action_id')->references('id')->on('actions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_actions');
    }
}
