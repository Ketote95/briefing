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
        Schema::create('fotografias', function (Blueprint $table) {
            $table->id();
            $table->string('empresa', 100);
            $table->string('tipo_brief', 50)->default("Fotografía");
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
            $table->text('tipos_fotografias')->nullable();
            $table->text('concepto_referencia')->nullable();
            $table->string('fecha_tentativa', 80)->nullable();
            $table->text('locaciones')->nullable();
            $table->text('referencias_visuales')->nullable();
            $table->text('formatos')->nullable();
            $table->text('canales')->nullable();
            $table->text('actores')->nullable();
            $table->text('perfiles_requeridos')->nullable();
            $table->date('fecha_limite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotografias');
    }
};
