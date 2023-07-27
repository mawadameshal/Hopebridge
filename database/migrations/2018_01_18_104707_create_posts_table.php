<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_no');
            $table->string('title');
            $table->integer('post_type')->unsigned();
            $table->integer('post_in_out')->unsigned();
            $table->integer('jeha_from')->unsigned();
            $table->integer('jeha_to')->unsigned();
            $table->date('post_date');
            $table->integer('tasneef')->unsigned();
            $table->string('pian')->nullable();
            $table->string('receive_way')->nullable();
            $table->string('jawwal')->nullable();
            $table->integer('need_answer')->nullable();
            $table->integer('importent_degree')->unsigned();
            $table->string('attachment')->nullable();
            $table->string('user_insert');
            $table->string('is_referd')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('post_type')->references('id')->on('post_types')->onDelete('cascade');
            $table->foreign('post_in_out')->references('id')->on('post_in_outs')->onDelete('cascade');
            $table->foreign('jeha_from')->references('id')->on('jehas')->onDelete('cascade');
            $table->foreign('jeha_to')->references('id')->on('jehas')->onDelete('cascade');
            $table->foreign('tasneef')->references('id')->on('post_tasneefs')->onDelete('cascade');
            $table->foreign('importent_degree')->references('id')->on('importent_degrees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
