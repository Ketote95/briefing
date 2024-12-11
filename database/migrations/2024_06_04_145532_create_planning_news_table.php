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
        Schema::create('planning_news', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('estado')->default(0);
            $table->string('empresa', 100);
            $table->string('tipo_brief', 50)->default("Planning digital nuevo");
            $table->string('categoria', 100);
            $table->string('marca', 100);
            $table->string('sitio_web', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->string('tiktok', 100)->nullable();
            $table->string('linkedin', 100)->nullable();
            $table->string('nombre_completo', 100);
            $table->string('correo', 50);
            $table->string('telefono', 15);
            $table->string('cargo_cliente', 50);
            $table->text('descripcion_empresa')->nullable();
            $table->text('competidores_directos')->nullable();
            $table->text('competidores_indirectos')->nullable();
            $table->text('ventajas_competitivas')->nullable();
            $table->text('desventajas_competitivas')->nullable();
            $table->text('productos_servicios')->nullable();
            $table->text('comunicacion_servicios')->nullable();
            $table->text('comercializacion_servicios')->nullable();
            $table->text('diferenciadores')->nullable();
            $table->text('precio_promedio')->nullable();
            $table->text('tipos_clientes')->nullable();
            $table->text('necesidades_publico')->nullable();
            $table->text('zonas_geograficas')->nullable();
            $table->text('habito_compra')->nullable();
            $table->text('frecuencia_promedio_compra')->nullable();
            $table->text('objetivo_principal')->nullable();
            $table->text('objetivo_secundario')->nullable();
            $table->text('duracion_estimada')->nullable();
            $table->text('mensajes_clave')->nullable();
            $table->text('preferencia_formatos')->nullable();
            $table->text('metricas_clave')->nullable();
            $table->text('objetivos_cuantitativos')->nullable();
            $table->text('presupuesto_total')->nullable();
            $table->text('temporalidad')->nullable();
            $table->text('canales')->nullable();
            $table->text('restriccion')->nullable();
            $table->text('basedatos_clientes')->nullable();
            $table->text('info_adicional')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planning_news');
    }
};
