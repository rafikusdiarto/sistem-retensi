<?php

namespace App\Imports;

use App\Models\Pasien;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class PasienImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $pasien = Pasien::create([

        //     'nik' => $row['nik'],
        //     'no_rm' => $row['no_rm'],
        //     'nama' => $row['nama'],
        //     'jenis_kelamin' => $row['jenis_kelamin'],

        //     // 'nama' => $row['nama'],
        //     // 'no_rm' => $row['no_rm'],
        //     // 'tgl_daftar' => $row['tgl_daftar'],
        //     // 'tgl_pulang' => $row['tgl_pulang'],
        //     // 'lama_dirawat' => $row['lama_dirawat'],
        //     // 'hari_perawatan' => $row['hari_perawatan'],
        // ]);
    }
}
