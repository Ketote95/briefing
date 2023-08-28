<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class communications extends Model
{
    use HasFactory;

    protected $table = "communications";

    protected $primaryKey = "id";

    protected $fillable = ['empresa', 'categoria', 'marca', 'sitio_web', 'facebook', 'instagram', 'tiktok', 'linkedin', 'nombre_completo', 'correo', 'telefono', 'descripcion_empresa', 'valores_marca', 'situacion_empresa', 'objetivos_marketing', 'objetivos_comerciales', 'barreras_comerciales', 'barreras_marketing', 'comunicar_servicios', 'comercializar_servicios', 'presencia_online', 'retos_digitalizacion', 'servicios_principales', 'publico_objetivo', 'necesidades_servicios', 'perfil_cliente', 'competidores_principales', 'aspectos_competidores', 'competidores_indirectos', 'aspectos_competidores_indirectos', 'contra_competidores', 'ventajas_competitivas', 'desventajas_competitivas', 'principales_diferenciadores', 'estrategias_comunicacion', 'trabajo_con_agencia', 'nueva_agencia', 'personalidad_marca', 'lenguaje_marca', 'presupuesto_anuncios', 'incrementar_presupuesto', 'google_ads', 'conformidad_sitio', 'database', 'info_importante', 'created_at', 'updated_at'];

    public $timestamps = true;
}
