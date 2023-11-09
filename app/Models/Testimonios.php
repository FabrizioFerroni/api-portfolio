<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonios extends Model
{
    use HasFactory;

    protected $fillable = ['cliente', 'cargo', 'descripcion', 'folder', 'imagen'];

    protected $hidden = ['folder',  'created_at', 'updated_at'];
}
