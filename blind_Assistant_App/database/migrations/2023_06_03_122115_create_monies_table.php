<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
    * Run the migrations.
    *
    * @return void
    */

    public function up() {
        Schema::create( 'monies', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'moneyName' );
            $table->string( 'faceImage', 512 );
            $table->string( 'backImage', 512 );
            $table->string( 'moneyNameVoice', 512 );
            $table->string( 'algorithms',512);
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
        Schema::dropIfExists('monies' );
        }
    }
    ;
