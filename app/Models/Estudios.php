<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudios extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'institucion', 'descripcion', 'duracion', 'fecha_desde_hasta', 'actual'];

    protected $hidden = ['created_at', 'updated_at'];
}
