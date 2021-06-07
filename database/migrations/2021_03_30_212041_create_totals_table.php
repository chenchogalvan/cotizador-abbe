<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totals', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("correo");
            $table->string("token");
            $table->string("totalInteres");
            $table->string("pagoMensual");
            $table->string("costoTotal");
            $table->string('tipoPeriocidad');
            $table->string('montoSolicitado');
            $table->string('periocidadPago');
            $table->string('plazoCredito');
            $table->string('tazaInteres');
            $table->string('tipoCredito');
            $table->dateTime('fechaSolicitud');
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
        Schema::dropIfExists('totals');
    }
}
