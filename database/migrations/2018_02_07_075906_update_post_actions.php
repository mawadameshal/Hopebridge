<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePostActions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_actions', function (Blueprint $table) {

            $table->integer('jeha_ref_to')->unsigned()->nullable();
            $table->integer('user_ref_to')->unsigned()->nullable();

            $table->foreign('jeha_ref_to')->references('id')->on('jehas');
            $table->foreign('user_ref_to')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
