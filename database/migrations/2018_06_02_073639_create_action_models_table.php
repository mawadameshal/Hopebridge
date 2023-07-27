<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {

            $table->increments('id');

            $table->string('icon')->nullable();

            $table->string('name', 100);

            $table->string('group_name', 100);

            $table->tinyInteger('is_menu')->unsigned();

            $table->tinyInteger('is_active')->unsigned();

            $table->integer('menu_order')->unsigned()->nullable();

            $table->integer('parent_id')->unsigned()->nullable();

            $table->integer('menu_parent_id')->unsigned()->nullable();



            $table->foreign('parent_id')->references('id')->on('actions')->onDelete('cascade');

            $table->foreign('menu_parent_id')->references('id')->on('actions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions');
    }
}
