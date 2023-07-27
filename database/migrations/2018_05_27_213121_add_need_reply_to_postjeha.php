<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNeedReplyToPostjeha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_jehas', function (Blueprint $table) {

            $table->integer('need_reply')->nullable();
            $table->integer('reply_post_id')->unsigned()->nullable();

            $table->foreign('reply_post_id')->references('id')->on('posts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posthehas', function (Blueprint $table) {
            //
        });
    }
}
