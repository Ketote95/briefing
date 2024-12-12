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
            $table->string('empresa', 60);
            $table->string('marca', 50);
            $table->string('industria', 50);
            $table->string('servicios', 80);
            $table->string('presencia_actual', 80);
            $table->string('competidores', 100);
            $table->string('nombre_contacto', 80);
            $table->string('puesto_contacto', 50);
            $table->string('telefono_contacto', 30);
            $table->string('correo_contacto', 70);
            $table->text('objetivo_general');
            $table->text('objetivos_especificos');
            $table->string('edades', 80);
            $table->string('genero', 80);
            $table->string('ubicacion', 120);
            $table->string('nivel_socioeconomico', 80);
            $table->text('intereses_especificos');
            $table->text('comportamiento_compra');
            $table->text('habitos_digitales');
            $table->string('bases_datos', 20);
            $table->string('plataformas', 120);
            $table->string('pauta_digital', 20);
            $table->string('mejores_plataformas', 120);
            $table->text('ciclo_compra');
            $table->text('habito_compra');
            $table->text('cambios_recientes');
            $table->text('competidores_directos');
            $table->text('competidores_indirectos');
            $table->text('alta_baja_competencia');
            $table->text('temporada_clave');
            $table->string('presupuesto_disponible', 30);
            $table->string('moneda', 10);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->text('distribucion_presupuesto');
            $table->text('recursos_creativos');
            $table->text('desarrollar_materiales');
            $table->string('formatos_campaña', 120);
            $table->text('restricciones');
            $table->text('vinculacion_campaña');
            $table->text('condiciones_externas');
            $table->text('producto_unico');
            $table->text('mensaje_principal');
            $table->text('tono_preferido');
            $table->text('indicadores_kpis');
            $table->text('resultados_concretos');
            $table->text('info_adicional')->nullable();
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
