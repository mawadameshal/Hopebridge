<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('child_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->integer('salary');
            $table->string('currency')->nullable();
            $table->integer('month');
            $table->integer('year');
            $table->string('bank')->nullable();
            $table->string('note')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('child_id')->references('id')->on('families');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('project_id')->references('id')->on('projects');
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
        Schema::dropIfExists('salaries');
    }
}
