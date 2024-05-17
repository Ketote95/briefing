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
        Schema::create('developments', function (Blueprint $table) {
            $table->id();
            $table->string("empresa", 50);
            $table->string('tipo_brief', 50)->default("Desarrollo web");
            $table->string("tamaño", 80);
            $table->string("presencia", 250);
            $table->string("inicio_desarrollo", 80);
            $table->string("tipo_desarrollo", 100);
            $table->text("año_diseño")->nullable();
            $table->text("aspectos_positivos")->nullable();
            $table->text("aspectos_negativos")->nullable();
            $table->text("manual_identidad")->nullable();
            $table->text("competidores")->nullable();
            $table->text("sitios_inspiracion")->nullable();
            $table->text("estilo_sitio_web")->nullable();
            $table->text("fotos")->nullable();
            $table->text("plan_fotos")->nullable();
            $table->text("sesion_fotos")->nullable();
            $table->text("imagenes_referenciales")->nullable();
            $table->text("videos")->nullable();
            $table->text("videos_stock")->nullable();
            $table->text("plan_videos")->nullable();
            $table->text("cambios_logo")->nullable();
            $table->text("archivo_logo")->nullable();
            $table->text("tipografia")->nullable();
            $table->text("archivos_tipografia")->nullable();
            $table->text("paleta_colores")->nullable();
            $table->text("cambios_colores")->nullable();
            $table->text("contenido_web")->nullable();
            $table->text("agencia_contenido")->nullable();
            $table->text("herramientas_web")->nullable();
            $table->text("sistemas_terceros")->nullable();
            $table->text("info_sistemas")->nullable();
            $table->text("redes_sociales")->nullable();
            $table->text("estructura_web")->nullable();
            $table->text("campos_formulario")->nullable();
            $table->text("correo_formularios")->nullable();
            $table->text("dominio_web")->nullable();
            $table->text("compra_dominio")->nullable();
            $table->text("credenciales_dominio")->nullable();
            $table->text("hosting_web")->nullable();
            $table->text("compra_hosting")->nullable();
            $table->text("credenciales_hosting")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developments');
    }
};
