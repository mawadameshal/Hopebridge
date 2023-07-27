<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('card_no')->nullable()->unique();
            $table->integer('card_no_wife')->nullable();
            $table->integer('type')->nullable();
            $table->string('name');
            $table->string('mobile')->nullable();
            $table->string('note')->nullable();
            $table->integer('status')->unsigned();
            $table->integer('state_id')->unsigned()->nullabel();
            $table->integer('region_id')->unsigned()->nullabel();
            $table->string('father_name')->nullabel();
            $table->string('address')->nullabel();
            $table->string('cus_entry')->nullabel();
            $table->string('second_father')->nullabel();
            $table->integer('citizin')->nullabel()->unsigned();
            $table->integer('citizin_value')->nullabel()->default(0);
            $table->integer('region_type')->nullabel()->unsigned();
            $table->integer('region_type_value')->nullabel()->default(0);
            $table->integer('main_reason')->nullabel()->unsigned();
            $table->integer('main_reason_value')->nullabel()->default(0);
            $table->integer('child_not_working')->default(0);
            $table->integer('child_not_working_value')->default(0);
            $table->integer('child_working')->default(0);
            $table->integer('child_working_value')->default(0);
            $table->integer('child_yatem_no')->default(0);
            $table->integer('child_yatem_no_value')->default(0);
            $table->integer('child_university')->default(0);
            $table->integer('child_university_value')->default(0);
            $table->integer('child_special')->default(0);
            $table->integer('child_special_value')->default(0);
            $table->integer('recieve_help')->nullabel()->unsigned();
            $table->integer('recieve_help_value')->nullabel()->default(0);
            $table->string('help_jeha_name')->nullabel();
            $table->integer('help_types')->nullabel()->unsigned();
            $table->integer('help_types_value')->nullabel()->default(0);
            $table->integer('shown_help')->nullabel()->unsigned();
            $table->integer('shown_help_value')->nullabel()->default(0);
            $table->integer('unrwa_help')->nullabel()->unsigned();
            $table->integer('unrwa_help_value')->nullabel()->default(0);
            $table->integer('work_day_no')->default(0);
            $table->integer('work_day_no_value')->default(0);
            $table->integer('education')->nullabel()->unsigned();
            $table->integer('education_value')->default(0);
            $table->integer('work')->nullabel()->unsigned();
            $table->integer('work_value')->default(0);
            $table->integer('work_region')->nullabel()->unsigned();
            $table->integer('work_region_value')->default(0);
            $table->integer('house_owner')->nullabel()->unsigned();
            $table->integer('house_owner_value')->default(0);
            $table->integer('house_type')->nullabel()->unsigned();
            $table->integer('house_type_value')->default(0);
            $table->integer('house_room')->nullabel()->unsigned();
            $table->integer('house_room_value')->default(0);
            $table->integer('house_material')->nullabel()->unsigned();
            $table->integer('house_material_value')->default(0);
            $table->integer('wall_material')->nullabel()->unsigned();
            $table->integer('wall_material_value')->default(0);
            $table->integer('house_shower')->nullabel()->unsigned();
            $table->integer('house_shower_value')->default(0);
            $table->integer('food_gaz')->nullabel()->unsigned();
            $table->integer('food_gaz_value')->default(0);
            $table->integer('user_pinion')->nullabel()->unsigned();
            $table->integer('user_pinion_value')->default(0);
            $table->integer('total')->default(0);
            $table->integer('total_perc')->default(0);
            $table->integer('child_no')->default(0);
            $table->integer('user_id')->nullabel()->unsigned();



            $table->timestamps();
            $table->SoftDeletes();

//            $table->foreign('state_id')->references('id')->on('states');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
}
