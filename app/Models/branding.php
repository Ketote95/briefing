<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branding extends Model
{
    use HasFactory;

    protected $table = "brandings";

    protected $primaryKey = "id";

    protected $fillable = [];

    public $timestamps = true;
}
