<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration {
    /**
    * Run the migrations.
    *
    * @return void
    */

    public function up() {
        Schema::create( 'services', function ( Blueprint $table ) {
            $table->id();
            $table->json( 'name' );
            $table->string( 'image' );
            $table->json( 'description' )->nullable();
            $table->unsignedBigInteger( 'user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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

        Schema::dropIfExists('services' );
        }
    }
