<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade')->unique(); //Borrar datos si se borra el usuario Dentista
            $table->date('fechaDe');
            $table->date('fechaA');
            $table->time('horaDe', 0);
            $table->time('horaA', 0);  
            $table->integer('activo');          
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
        Schema::dropIfExists('disponibles');
    }
}
