<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcaraLampirans extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function lampiran()
    {
        return $this->belongsTo(BeritaAcara::class);
    }
}