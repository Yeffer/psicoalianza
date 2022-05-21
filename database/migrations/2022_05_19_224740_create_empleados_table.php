<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('identificacion');
            $table->integer('telefono');           
            $table->unsignedBigInteger('pais_id');
            $table->unsignedBigInteger('ciudad_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();  

            $table->foreign('pais_id')
                ->references('id')
                ->on('paises');

            $table->foreign('ciudad_id')
                ->references('id')
                ->on('ciudades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
