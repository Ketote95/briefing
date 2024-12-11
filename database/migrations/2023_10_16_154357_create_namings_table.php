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
            $table->boolean('estado')->default(0);
            $table->string("empresa", 100);
            $table->string("tipo_brief", 50)->default("Naming");
            $table->string("rubro", 100);
            $table->string("productos_servicios", 100);
            $table->text("historia");
            $table->text("mensaje_global")->nullable();
            $table->text("principales_atributos")->nullable();
            $table->text("nombre_asociado")->nullable();
            $table->text("valores_asociacion")->nullable();
            $table->text("mision")->nullable();
            $table->text("vision")->nullable();
            $table->text("publico_objetivo")->nullable();
            $table->text("caracteristicas")->nullable();
            $table->text("consideraciones")->nullable();
            $table->text("preferencia_elementos")->nullable();
            $table->text("restriccion_elementos")->nullable();
            $table->text("lista_competidores")->nullable();
            $table->text("nombres_empresas_agrado")->nullable();
            $table->text("nombres_empresas_desagrado")->nullable();
            $table->text("referencias_naming")->nullable();
            $table->text("informacion_importante")->nullable();
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
