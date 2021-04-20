<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            
            $table->id();

            $table->string('escalonado');
            $table->string('condicionfiscal');
            $table->string('rubro');
            $table->string('direccion');
            $table->string('localidad');
            $table->string('provincia');
            $table->string('codigo_postal');
            $table->string('vigencia_de_contrato');
            $table->string('fecha_de_vencimiento');
            $table->string('cantidad_de_meses');
       
            $table->string('realizar');
            $table->string('autorizacion');

            $table->string('fecha_estimada_de_firma');

            $table->string('mpp_efectivo')->nullable();
            $table->string('mpp_transferencia')->nullable();
            $table->string('mpd_efectivo')->nullable();
            $table->string('mpd_transferencia')->nullable();
            $table->string('oferente')->nullable();
            $table->string('locatario')->nullable();

            $table->string('g1_fiador')->nullable();
            $table->string('g1_tp1')->nullable();
            $table->string('g1_d1')->nullable();
            $table->string('g1_tp2')->nullable();
            $table->string('g1_d2')->nullable();

            $table->string('g2_fiador')->nullable();
            $table->string('g2_tp1')->nullable();
            $table->string('g2_d1')->nullable();
            $table->string('g2_tp2')->nullable();
            $table->string('g2_d2')->nullable();
            
           
      
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('category_id');
           


            /* user_id hace referencia al id de la tabla users */
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('category_id')->references('id')->on('categories');


            $table->timestamps();  //created_at update_at crea estas dos columnas
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
