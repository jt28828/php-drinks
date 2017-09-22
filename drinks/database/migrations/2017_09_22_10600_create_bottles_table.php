<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBottlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('bottles')) {
            Schema::create('bottles', function (Blueprint $table) {
                $table->increments('bottle_id');
                $table->string('bottle_name');
                $table->string('bottle_type');
                $table->string('bottle_image')->nullable();
                $table->integer('alcohol_content_percent')->nullable();
                $table->timestamps();
            });
        } else {
            Schema::table('bottles', function (Blueprint $table) {
                $table->increments('bottle_id');
                $table->string('bottle_name');
                $table->string('bottle_type');
                $table->string('bottle_image')->nullable();
                $table->integer('alcohol_content_percent')->nullable();
                $table->timestamps();
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
        Schema::drop('bottles');
    }
}
