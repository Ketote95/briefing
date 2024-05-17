<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class audiovisual extends Model
{
    protected $table = 'audiovisuals';

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
        'objetivo_principal',
        'objetivo_secundario',
        'publico',
        'tipo_video',
        'tono_deseado',
        'pilares',
        'cantidad_videos',
        'duracion_videos',
        'locaciones',
        'referencias_visuales',
        'canales',
        'dimensiones',
        'presupuesto_estimado',
        'fecha_tentativa',
        'fecha_materiales',
        'dias_horarios',
        'formatos',
        'voz_off',
        'genero_musical',
        'actores',
        'perfiles_requeridos',
        'tomas_aereas',
        'elementos_visuales',
        'subtitulos',
        'restricciones_legales',
        'info_adicional',
    ];

    public $timestamps = true;
}
