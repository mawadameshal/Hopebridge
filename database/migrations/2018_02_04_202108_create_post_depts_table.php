<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostDeptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_depts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->integer('post_jeha_id')->unsigned();
            $table->integer('jeha_id')->unsigned();
            $table->integer('dept_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('action_id')->unsigned()->nullable();
            $table->dateTime('action_date')->nullable();
            $table->string('reason')->nullable();
            $table->string('note')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('is_read');  // 0=>not read , 1=>read
            $table->dateTime('read_date')->nullable();
            $table->integer('is_proved')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('post_id')->references('id')->on('posts')->OnDelete('cascade');
            $table->foreign('jeha_id')->references('id')->on('jehas');
            $table->foreign('post_jeha_id')->references('id')->on('post_jehas');
            $table->foreign('dept_id')->references('id')->on('departments');
            $table->foreign('status_id')->references('id')->on('post_statuses');
            $table->foreign('action_id')->references('id')->on('action_types');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_depts');
    }
}
