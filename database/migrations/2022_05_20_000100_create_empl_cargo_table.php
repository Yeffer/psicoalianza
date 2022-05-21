<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmplCargoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empl_cargo', function (Blueprint $table) {
            $table->bigIncrements('id');           
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('cargo_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();  

            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados');

            $table->foreign('cargo_id')
                ->references('id')
                ->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empl_cargo');
    }
}
