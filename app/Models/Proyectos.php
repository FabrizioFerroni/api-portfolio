<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    use HasFactory;

    protected $fillable = [
        'imagen',
        'titulo',
        'tags',
        'descripcion',
        'is_online',
        'is_private',
        'url_proyecto',
        'url_github',
        'categoria',
    ];


    protected $hidden = ['folder', 'created_at', 'updated_at'];

    protected $casts = [
        'tags' => 'array',
    ];
}
