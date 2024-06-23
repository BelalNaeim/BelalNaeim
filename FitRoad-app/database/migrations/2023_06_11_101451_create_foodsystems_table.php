<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodsystems', function (Blueprint $table) {
            $table->id();
            $table->string('food_system_name');
            $table->integer('total_day_calories');
            $table->integer('meals_number');
            $table->string('for_over_weight');
            $table->text('food_system_content');
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
        Schema::dropIfExists('foodsystems');
    }
};
