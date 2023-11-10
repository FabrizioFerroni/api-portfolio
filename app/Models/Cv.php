<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;


    protected $fillable = ['nombre', 'actual', 'cv'];

    protected $hidden = ['folder', 'created_at', 'updated_at'];

    public function downloads()
    {
        return $this->hasMany(DownloadCv::class);
    }
}
