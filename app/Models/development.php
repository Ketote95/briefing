<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class development extends Model
{
    use HasFactory;

    protected $table = "developments";

    protected $primaryKey = "id";

    protected $fillable = ['empresa', 'tamaño', 'presencia', 'inicio_desarrollo', 'tipo_desarrollo', 'año_diseño', 'aspectos_positivos', 'aspectos_negativos', 'manual_identidad', 'competidores', 'sitios_inspiracion', 'estilo_sitio_web', 'fotos', 'plan_fotos', 'sesion_fotos', 'imagenes_referenciales', 'videos', 'videos_stock', 'plan_videos', 'cambios_logo', 'archivo_logo', 'tipografia', 'archivos_tipografia', 'paleta_colores', 'contenido_web', 'agencia_contenido', 'herramientas_web', 'sistemas_terceros', 'info_sistemas', 'redes_sociales', 'estructura_web', 'campos_formulario', 'correo_formularios', 'dominio_web', 'compra_dominio', 'credenciales_dominio'];

    public $timestamps = true;
}
