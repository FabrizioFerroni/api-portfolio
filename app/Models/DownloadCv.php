<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadCv extends Model
{
    use HasFactory;

    protected $fillable = ['cv_id', 'ip_address', 'count', 'last_download_date'];

    protected $hidden = ['created_at', 'updated_at'];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
