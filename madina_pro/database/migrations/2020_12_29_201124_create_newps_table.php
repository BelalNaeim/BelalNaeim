<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newps', function (Blueprint $table) {
            $table->id();
            $table->string('writer');
            $table->string('title');
            $table->date('date');
            $table->text('description'); 
            $table->string('image');
            $table->text('vedio')->nullable(); 
            $table->foreignId('project_id')->nullable()->constrained();
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
        Schema::dropIfExists('newps');
    }
}
