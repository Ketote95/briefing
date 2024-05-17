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
        Schema::create('brandings', function (Blueprint $table) {
            $table->id();
            $table->string('empresa', 80);
            $table->string('tipo_brief', 50)->default("Creación de marca");
            $table->string('naming', 50);
            $table->string('categoria', 50);
            $table->string('diferencia', 200);
            $table->text('servicios_productos');
            $table->text('eleccion_empresa')->nullable();
            $table->text('años')->nullable();
            $table->text('fortalezas_debilidades')->nullable();
            $table->text('vision')->nullable();
            $table->text('competidores_principales')->nullable();
            $table->text('motivo')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('valores')->nullable();
            $table->text('asociacion')->nullable();
            $table->text('descripcion_unapalabra')->nullable();
            $table->text('logotipo')->nullable();
            $table->text('elementos_logotipo')->nullable();
            $table->text('rediseño_logo')->nullable();
            $table->text('años_logo')->nullable();
            $table->text('mision')->nullable();
            $table->text('slogan')->nullable();
            $table->text('reconocimiento')->nullable();
            $table->text('reconocimiento_logotipo')->nullable();
            $table->text('uso_colores')->nullable();
            $table->text('paletas')->nullable();
            $table->text('uso_logotipo')->nullable();
            $table->text('adicion_logo')->nullable();
            $table->text('definicion_logotipo')->nullable();
            $table->text('preferencias_iconos')->nullable();
            $table->text('gustos_logo')->nullable();
            $table->text('restricciones_logo')->nullable();
            $table->text('aplicaciones_logo')->nullable();
            $table->text('referencias_logos')->nullable();
            $table->text('publico_objetivo')->nullable();
            $table->text('utilizacion_producto')->nullable();
            $table->text('concentracion_publico')->nullable();
            $table->text('formas_publicidad')->nullable();
            $table->text('conocer_empresa')->nullable();
            $table->integer('ingresos_promedio_publico')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brandings');
    }
};
