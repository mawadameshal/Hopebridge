<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostJehasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_jehas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->integer('jeha_id')->unsigned();
            $table->integer('jeha_from_id')->unsigned();
            $table->integer('status')->unsigned();
            $table->integer('action')->unsigned()->nullable();
            $table->dateTime('action_date')->nullable();
            $table->string('reason')->nullable();
            $table->string('note')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('is_read')->nullable();  // Null=>not read , 1=>read
            $table->dateTime('read_date')->nullable();
            $table->integer('is_referd')->nullable();  // Null=>not referd , 1=>referd
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('post_id')->references('id')->on('posts')->OnDelete('cascade');
            $table->foreign('jeha_id')->references('id')->on('jehas');
            $table->foreign('jeha_from_id')->references('id')->on('jehas');
            $table->foreign('status')->references('id')->on('post_statuses');
            $table->foreign('action')->references('id')->on('action_types');
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
        Schema::dropIfExists('post__depts');
    }
}
