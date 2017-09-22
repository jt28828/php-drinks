<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drinks', function (Blueprint $table) {
            $table->increments('drink_id');
            $table->string('drink_name');
            $table->string('drink_image');
            $table->string('ingredient_1');
            $table->string('ingredient_2');
            $table->string('ingredient_3');
            $table->string('ingredient_4');
            $table->string('ingredient_1_amount');
            $table->string('ingredient_2_amount');
            $table->string('ingredient_3_amount');
            $table->string('ingredient_4_amount');
            $table->string('drink_color');
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
        Schema::table('drinks', function (Blueprint $table) {
            //
        });
    }
}
