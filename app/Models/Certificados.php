<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificados extends Model
{
    use HasFactory;

    protected $fillable = [
        'imagen',
        'titulo',
        'tags',
        'academia',
        'rango_fecha',
        'certificado'
    ];


    protected $hidden = ['folder', 'folder_certificado'];

    protected $casts = [
        'tags' => 'array',
    ];
}
