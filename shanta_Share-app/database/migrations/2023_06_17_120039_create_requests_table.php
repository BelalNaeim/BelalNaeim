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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->dateTime('adda');
            $table->string('fromcount');
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
            $table->text('atdo');
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
        Schema::dropIfExists('requests');
    }
};
