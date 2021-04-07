<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alquileres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id();
            
            
            $table->integer('post_id');

           
            $table->double('alquiler',15,2)->nullable();
            $table->double('facturacion',15,2)->nullable();
            $table->integer('meses')->nullable();
        
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
        Schema::dropIfExists('alquileres');
    }
}
