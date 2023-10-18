<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('namings', function (Blueprint $table) {
            $table->id();
            $table->string("rubro", 100);
            $table->string("productos_servicios", 100);
            $table->text("historia");
            $table->text("mensaje_global");
            $table->text("principales_atributos");
            $table->text("nombre_asociado");
            $table->text("valores_asociacion");
            $table->text("mision");
            $table->text("vision");
            $table->text("publico_objetivo");
            $table->text("caracteristicas");
            $table->text("consideraciones");
            $table->text("preferencia_elementos");
            $table->text("restriccion_elementos");
            $table->text("lista_competidores");
            $table->text("nombres_empresas_agrado");
            $table->text("nombres_empresas_desagrado");
            $table->text("referencias_naming");
            $table->text("informacion_importante");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('namings');
    }
};
