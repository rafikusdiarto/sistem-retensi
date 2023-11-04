<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcaraLampiran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function berita_acara_lampiran()
    {
        return $this->belongsTo(BeritaAcara::class);
    }
}
