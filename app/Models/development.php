<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class development extends Model
{
    use HasFactory;

    protected $table = "development";

    protected $primaryKey = "id";

    protected $fillable = ['empresa', 'categoria', 'marca', 'sitio_web'];

    public $timestamps = true;
}
