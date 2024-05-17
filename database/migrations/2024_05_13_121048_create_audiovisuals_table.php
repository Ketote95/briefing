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
        Schema::create('audiovisuals', function (Blueprint $table) {
            $table->id();
            $table->string('empresa', 100);
            $table->string('tipo_brief', 50)->default("Audiovisual");
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
            $table->text('objetivo_principal')->nullable();
            $table->text('objetivo_secundario')->nullable();
            $table->text('publico')->nullable();
            $table->text('tipo_video')->nullable();
            $table->text('tono_deseado')->nullable();
            $table->text('pilares')->nullable();
            $table->text('cantidad_videos')->nullable();
            $table->text('duracion_videos')->nullable();
            $table->text('locaciones')->nullable();
            $table->text('referencias_visuales')->nullable();
            $table->text('canales')->nullable();
            $table->text('dimensiones')->nullable();
            $table->text('presupuesto_estimado')->nullable();
            $table->text('fecha_tentativa')->nullable();
            $table->date('fecha_materiales')->nullable();
            $table->text('dias_horarios')->nullable();
            $table->text('formatos')->nullable();
            $table->text('voz_off')->nullable();
            $table->text('genero_musical')->nullable();
            $table->text('actores')->nullable();
            $table->text('perfiles_requeridos')->nullable();
            $table->text('tomas_aereas')->nullable();
            $table->text('elementos_visuales')->nullable();
            $table->text('subtitulos')->nullable();
            $table->text('restricciones_legales')->nullable();
            $table->text('info_adicional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audiovisuals');
    }
};
