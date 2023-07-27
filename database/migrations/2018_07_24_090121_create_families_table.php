<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->string('name');
            $table->integer('card_no');
            $table->date('dob');
            $table->integer('jender_id')->unsigned();
            $table->integer('relation');
            $table->integer('work_id');
            $table->integer('health_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('is_yatem')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('jender_id')->references('id')->on('jenders');
            $table->foreign('health_id')->references('id')->on('healths');
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
        Schema::dropIfExists('families');
    }
}
