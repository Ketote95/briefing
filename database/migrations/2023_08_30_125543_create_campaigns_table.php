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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->boolean('estado')->default(0);
            $table->string('empresa', 100);
            $table->string('tipo_brief', 50)->default("Creativo y de campañas");
            $table->string('categoria', 100);
            $table->string('marca', 100);
            $table->string('sub_marca', 100);
            $table->integer('plazo');
            $table->integer('duracion');
            $table->integer('presupuesto');
            $table->text('antecedentes');
            $table->text('justificacion');
            $table->text('descripcion_servicio');
            $table->text('publico');
            $table->text('promesa');
            $table->text('objetivos');
            $table->text('linea_comunicacional');
            $table->text('competidores');
            $table->text('servicios_competidores');
            $table->text('atributos');
            $table->text('medios');
            $table->text('entregables');
            $table->text('plazos');
            $table->text('voz');
            $table->text('condicionantes');
            $table->text('info_adicional');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
