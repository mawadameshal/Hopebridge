<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_actions', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->integer('jeha_id')->unsigned();
            $table->integer('action_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->string('note')->nullable();
            $table->string('reason')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->softDeletes();
            $table->foreign('post_id')->references('id')->on('posts')->OnDelete('cascade');;
            $table->foreign('jeha_id')->references('id')->on('jehas');
            $table->foreign('action_id')->references('id')->on('action_types');
            $table->foreign('status_id')->references('id')->on('post_statuses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_actions');
    }
}
