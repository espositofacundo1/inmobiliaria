<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class APagarALaFirmas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_pagar_a_la_firmas', function (Blueprint $table) {


            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->double('adelanto',15,2)->nullable();
            $table->double('deposito_en_pesos',15,2)->nullable();
            $table->double('deposito_en_usd',15,2)->nullable();
            $table->double('informes',15,2)->nullable();
         

            

            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('posts');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_pagar_a_la_firmas');
    }
}
