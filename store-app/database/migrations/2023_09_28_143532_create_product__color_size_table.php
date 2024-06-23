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
        Schema::create('product_color_size', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_size_id')->references('id')->on('product_sizes')->constrained();
            $table->foreignId('product_color_id')->references('id')->on('product_colors')->constrained();
            $table->integer('quantity');
            $table->decimal('price_two', 8, 2)->nullable();
            $table->decimal('discount', 8, 2)->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('product__color_size');
    }
};
