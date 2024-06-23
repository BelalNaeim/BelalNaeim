<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('space');
            $table->double('budget', 8, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('contractor_name');
            $table->string('consultant_name');
            $table->text('description'); 
            $table->string('image');
            $table->text('location'); 
            $table->enum('size',['عادي', 'ضخم']); 
            $table->integer('flage')->default(0);
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('type_id')->nullable()->constrained();
            $table->foreignId('governorate_id')->nullable()->constrained();
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses'); 
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
        Schema::dropIfExists('projects');
    }
}
