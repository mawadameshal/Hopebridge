<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable;
            $table->string('sys_name')->nullable;
            $table->string('address')->nullable;
            $table->string('mobile')->nullable;
            $table->string('phone')->nullable;
            $table->string('site')->nullable;
            $table->string('email')->nullable;
            $table->string('img_name')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
