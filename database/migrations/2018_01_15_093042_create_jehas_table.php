<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJehasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jehas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->integer('status');
            $table->integer('type'); // 1=>in, 2=>out
            $table->integer('parent_id')->nullable(); // 1=>in, 2=>out
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jehas');
    }
}
