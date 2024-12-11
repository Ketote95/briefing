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
        Schema::create('communications', function (Blueprint $table) {
            $table->id();
            $table->boolean('estado')->default(0);
            $table->string('empresa', 100);
            $table->string('tipo_brief', 50)->default("Comunicación");
            $table->string('categoria', 100);
            $table->string('marca', 100);
            $table->string('sitio_web', 100);
            $table->string('facebook', 100);
            $table->string('instagram', 100);
            $table->string('tiktok', 100);
            $table->string('linkedin', 100);
            $table->string('nombre_completo', 100);
            $table->string('correo', 50);
            $table->string('telefono', 15);
            $table->text('descripcion_empresa')->nullable();
            $table->text('valores_marca')->nullable();
            $table->text('situacion_empresa')->nullable();
            $table->text('objetivos_marketing')->nullable();
            $table->text('objetivos_comerciales')->nullable();
            $table->text('barreras_comerciales')->nullable();
            $table->text('barreras_marketing')->nullable();
            $table->text('comunicar_servicios')->nullable();
            $table->text('comercializar_servicios')->nullable();
            $table->text('presencia_online')->nullable();
            $table->text('retos_digitalizacion')->nullable();
            $table->text('servicios_principales')->nullable();
            $table->text('publico_objetivo')->nullable();
            $table->text('necesidades_servicios')->nullable();
            $table->text('perfil_cliente')->nullable();
            $table->text('competidores_principales')->nullable();
            $table->text('aspectos_competidores')->nullable();
            $table->text('competidores_indirectos')->nullable();
            $table->text('aspectos_competidores_indirectos')->nullable();
            $table->text('contra_competidores')->nullable();
            $table->text('ventajas_competitivas')->nullable();
            $table->text('desventajas_competitivas')->nullable();
            $table->text('principales_diferenciadores')->nullable();
            $table->text('estrategias_comunicacion')->nullable();
            $table->text('trabajo_con_agencia')->nullable();
            $table->text('nueva_agencia')->nullable();
            $table->text('personalidad_marca')->nullable();
            $table->text('lenguaje_marca')->nullable();
            $table->text('presupuesto_anuncios')->nullable();
            $table->text('incrementar_presupuesto')->nullable();
            $table->text('google_ads')->nullable();
            $table->text('conformidad_sitio')->nullable();
            $table->text('database')->nullable();
            $table->text('info_importante')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communications');
    }
};
