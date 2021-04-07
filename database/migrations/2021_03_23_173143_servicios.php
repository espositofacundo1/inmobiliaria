<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Servicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            
            $table->id();

            $table->unsignedBigInteger('post_id');
           
          
            $table->double('osse',15,2)->nullable();
            $table->char('osse_solicitar',3)->nullable();

           
            $table->double('edea',15,2)->nullable(); 
            $table->char('edea_solicitar',3)->nullable();
            
        
            $table->double('gas',15,2)->nullable();
            $table->char('gas_solicitar',3)->nullable();

      
            $table->double('tsu',15,2)->nullable(); 
            $table->char('tsu_solicitar',3)->nullable();

    
            $table->double('expensas_extra',15,2)->nullable(); 
            $table->char('expensas_extra_solicitar',3)->nullable();

            $table->double('expensas_ord',15,2)->nullable();
            $table->char('expensas_ord_solicitar',3)->nullable();

           
            $table->double('arba',15,2)->nullable();
            $table->char('arba_solicitar',3)->nullable();


            $table->double('seguro',15,2)->nullable();
            $table->char('seguro_solicitar',3)->nullable();

            $table->string('otros1_nombre')->nullable();
            $table->double('otros1',15,2)->nullable();
            $table->char('otros1_solicitar',3)->nullable();

            $table->string('otros2_nombre')->nullable();
            $table->double('otros2',15,2)->nullable();
            $table->char('otros2_solicitar',3)->nullable();

            $table->string('otros3_nombre')->nullable();
            $table->double('otros3',15,2)->nullable();
            $table->char('otros3_solicitar',3)->nullable();
            

       
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
        Schema::dropIfExists('servicios');
    }
}
