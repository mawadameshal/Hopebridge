<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostJehaSecurityDegree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_jehas', function (Blueprint $table) {

            $table->integer('security_degree')->unsigned()->nullable();
            $table->foreign('security_degree')->references('id')->on('security_degrees');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_jehas', function (Blueprint $table) {
            //
        });
    }
}
