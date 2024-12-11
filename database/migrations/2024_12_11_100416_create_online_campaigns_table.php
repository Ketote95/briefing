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
        Schema::create('online_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('empresa', 100);
            $table->string('tipo_brief', 50)->default("Campaña online");
            $table->string('responsable_empresa', 80);
            $table->string('nombre_campaña', 80);
            $table->string('email', 80);
            $table->string('telefono', 30);
            $table->string('objetivo_campaña', 70);
            $table->string('sitio_web', 70);
            $table->string('destino', 70);
            $table->string('facebook', 70);
            $table->string('youtube', 70);
            $table->string('twitter', 70);
            $table->string('linkedin', 70);
            $table->string('instagram', 70);
            $table->string('app', 70);
            $table->string('competencia_directa', 70);
            $table->string('recursos_graficos', 70);
            $table->string('recursos_audiovisuales', 70);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('presupuesto_campaña', 70);
            $table->string('moneda', 20);
            $table->string('pais', 30);
            $table->string('ciudades', 150);
            $table->string('edades', 90);
            $table->string('generos', 70);
            $table->string('descripcion_publico', 70)->nullable();
            $table->string('plataformas', 70);
            $table->string('funnel_stage', 70);
            $table->text('info_adicional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('online_campaigns');
    }
};
