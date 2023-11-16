<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'asunto',
        'mensaje',
        'fecha_enviado'
    ];


    protected $hidden = ['created_at', 'updated_at'];
}
