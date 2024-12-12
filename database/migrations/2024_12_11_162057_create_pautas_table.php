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
        Schema::create('pautas', function (Blueprint $table) {
            $table->id();
            $table->string('empresa');
            $table->string('marca');
            $table->string('industria');
            $table->string('servicios');
            $table->string('presencia_actual');
            $table->string('competidores');
            $table->string('nombre_contacto');
            $table->string('puesto_contacto');
            $table->string('telefono_contacto');
            $table->string('correo_contacto');
            $table->string('objetivo_general');
            $table->string('objetivos_especificos');
            $table->string('edades');
            $table->string('genero');
            $table->string('ubicacion');
            $table->string('nivel_socioeconomico');
            $table->string('intereses_especificos');
            $table->string('comportamiento_compra');
            $table->string('habitos_digitales');
            $table->string('bases_datos');
            $table->string('plataformas');
            $table->string('pauta_digital');
            $table->string('mejores_plataformas');
            $table->string('ciclo_compra');
            $table->string('habito_compra');
            $table->string('cambios_recientes');
            $table->string('competidores_directos');
            $table->string('competidores_indirectos');
            $table->string('alta_baja_competencia');
            $table->string('temporada_clave');
            $table->string('presupuesto_disponible');
            $table->string('moneda');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('distribucion_presupuesto');
            $table->string('recursos_creativos');
            $table->string('desarrollar_materiales');
            $table->string('formatos_campaña');
            $table->string('indicadores_exito');
            $table->string('resultados_positivos');
            $table->string('resultados_inmediatos');
            $table->string('restricciones');
            $table->string('vinculacion_campaña');
            $table->string('condiciones_externas');
            $table->string('producto_unico');
            $table->string('mensaje_principal');
            $table->string('tono_preferido');
            $table->string('indicadores_kpis');
            $table->string('resultados_concretos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pautas');
    }
};
