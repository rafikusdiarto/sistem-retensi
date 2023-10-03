<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    // protected $table = ['pasiens'];
    protected $fillable = [
        'no_rm',
        'nik',
        'nama',
        'jenis_kelamin',
        'jenis_pelayanan',
        'dokter',
        'alamat',
        'status',
        'mrs',
        'krs',
        'tgl_retensi',
    ];
    protected $dates = ['tgl_retensi'];
}
