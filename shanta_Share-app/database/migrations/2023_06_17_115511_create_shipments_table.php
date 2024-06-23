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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');             
            $table->dateTime('adda');
            $table->string('fromcount');
            $table->string('fromcity');
            $table->string('tocount');
            $table->string('tocity');
            $table->float('shwe');
            $table->dateTime('ndbfda');
            $table->string('prlink');
            $table->string('prname');
            $table->string('prtype');
            $table->string('prprice');
            $table->string('prquan');
            $table->string('primage');
            $table->text('prdet');
            $table->string('dshto');
            $table->text('atds');
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
        Schema::dropIfExists('shipments');
    }
};
