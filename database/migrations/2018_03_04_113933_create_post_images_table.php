<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_images', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('file_name');
            $table->string('file_desc')->nullable();
            $table->string('file_details')->nullable();
            $table->string('file_ext')->nullable();
            $table->timestamps();
            $table->SoftDeletes();

            $table->foreign('post_id')->references('id')->on('posts');
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
        Schema::dropIfExists('post_images');
    }
}
