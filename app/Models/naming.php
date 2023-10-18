<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class naming extends Model
{
    use HasFactory;

    protected $table = "namings";

    protected $primaryKey = "id";

    protected $fillable = [];

    public $timestamps = true;
}
