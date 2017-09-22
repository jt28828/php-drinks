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
        if (!Schema::hasTable('drinks')) {
            Schema::create('drinks', function (Blueprint $table) {
                $table->increments('drink_id');
                $table->string('drink_name');
                $table->string('drink_image')->nullable();
                $table->unsignedInteger('ingredient_1');
                $table->unsignedInteger('ingredient_2')->nullable();
                $table->unsignedInteger('ingredient_3')->nullable();
                $table->unsignedInteger('ingredient_4')->nullable();
                $table->integer('ingredient_1_amount');
                $table->integer('ingredient_2_amount')->nullable();
                $table->integer('ingredient_3_amount')->nullable();
                $table->integer('ingredient_4_amount')->nullable();
                $table->string('drink_color')->default('#2196F3');
                $table->timestamps();

                //Foreign Keys
                $table->foreign('ingredient_1')->references('bottle_id')->on('bottles');
                $table->foreign('ingredient_2')->references('bottle_id')->on('bottles');
                $table->foreign('ingredient_3')->references('bottle_id')->on('bottles');
                $table->foreign('ingredient_4')->references('bottle_id')->on('bottles');
            });
        } else {
            Schema::table('drinks', function (Blueprint $table) {
                $table->increments('drink_id');
                $table->string('drink_name');
                $table->string('drink_image');
                $table->unsignedInteger('ingredient_1');
                $table->unsignedInteger('ingredient_2')->nullable();
                $table->unsignedInteger('ingredient_3')->nullable();
                $table->unsignedInteger('ingredient_4')->nullable();
                $table->integer('ingredient_1_amount');
                $table->integer('ingredient_2_amount')->nullable();
                $table->integer('ingredient_3_amount')->nullable();
                $table->integer('ingredient_4_amount')->nullable();
                $table->string('drink_color')->default('#2196F3');
                $table->timestamps();

                //Foreign Keys
                $table->foreign('ingredient_1')->references('bottle_id')->on('bottles');
                $table->foreign('ingredient_2')->references('bottle_id')->on('bottles');
                $table->foreign('ingredient_3')->references('bottle_id')->on('bottles');
                $table->foreign('ingredient_4')->references('bottle_id')->on('bottles');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drinks');
    }
}
