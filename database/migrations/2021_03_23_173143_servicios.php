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
            $table->string('servicio');
            $table->double('abonalocador',15,2)->default(0);           
            $table->double('monto',15,2)->default(0);
            $table->integer('solicitar')->default(0);
            $table->timestamps();



            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('post_id');
           


            /* user_id hace referencia al id de la tabla users */
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('team_id')->references('id')->on('teams');
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
