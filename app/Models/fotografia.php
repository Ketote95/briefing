<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fotografia extends Model
{
    protected $table = 'fotografias';

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
        'tipos_fotografias',
        'concepto_referencia',
        'fecha_tentativa',
        'locaciones',
        'referencias_visuales',
        'formatos',
        'canales',
        'actores',
        'perfiles_requeridos',
        'fecha_limite',
    ];

    public $timestamps = true;
}
