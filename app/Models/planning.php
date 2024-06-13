<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planning extends Model
{
    protected $table = 'plannings';

    protected $primaryKey = 'id';

    protected $fillable = [
        'empresa',
        'categoria',
        'marca',
        'sitio_web',
        'facebook',
        'instagram',
        'tiktok',
        'linkedin',
        'nombre_completo',
        'correo',
        'telefono',
        'cargo_cliente',
        'productos_servicios',
        'comunicacion_servicios',
        'comercializacion_servicios',
        'diferenciadores',
        'precio_promedio',
        'tipos_clientes',
        'necesidades_publico',
        'zonas_geograficas',
        'habito_compra',
        'frecuencia_promedio_compra',
        'objetivo_principal',
        'objetivo_secundario',
        'duracion_estimada',
        'mensajes_claves',
        'preferencia_formatos',
        'metricas_clave',
        'objetivos_cuantitativos',
        'presupuesto_total',
        'temporalidad',
        'canales',
        'restriccion',
        'basedatos_clientes',
        'info_adicional',
    ];

    public $timestamps = true;
}
