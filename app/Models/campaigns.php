<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campaigns extends Model
{
    protected $table = "campaigns";
    
    protected $primaryKey = "id";

    protected $fillable = ["empresa", "categoria", "marca", "sub_marca", "plazo", "duracion", "presupuesto", "antecedentes", "justificacion", "descripcion_servicio", "publico", "promesa", "objetivos", "linea_comunicacional", "competidores", "servicios_competidores", "atributos", "medios", "entregables", "plazos", "voz", "condicionantes", "info_adicional"];

    public $timestamps = true;
}
