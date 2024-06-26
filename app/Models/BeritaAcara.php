<?php

namespace App\Models;

use App\Models\BeritaAcaraLampiran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BeritaAcara extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lampirans()
    {
        return $this->hasMany(BeritaAcaraLampiran::class);
    }
}
