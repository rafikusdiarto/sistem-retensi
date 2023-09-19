<?php

namespace App\Http\Controllers\Petugas;

use Carbon\Carbon;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Imports\PasienImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use App\Models\User;

class DataRekamMedisController extends Controller
{
    public function __construct(){
        $this->middleware(['role:petugas']);
    }

    public function index(){
        try {
            $data_pasien = Pasien::all();
            return view('petugas.data-rm.list', ['pasien' => $data_pasien]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function add(){
        try {
            return view('petugas.data-rm.tambahdata');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function importFile(Request $request){
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('data_excel',$nama_file);

        // $heading = (new HeadingRowImport)->toArray($file);
        // dd($heading);

        $data_pasien = Excel::toArray(new PasienImport, public_path('/data_excel/'.$nama_file));
        $data_pasien = $data_pasien[0];
        $insert_dataPasien = [];

        foreach ($data_pasien as $row) {
            // $x = intval($row['tgl_daftar']);
            // $y = intval($row['tgl_pulang']);
            $insert_dataPasien[] = [
                'no_rm' => $row['no_rm'],
                'nik' => $row['nik'],
                'nama' => $row['nama'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                // 'tgl_daftar' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($x),
                // 'tgl_pulang' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($y),
                // 'lama_dirawat' => $row['lama_dirawat'],
                // 'hari_perawatan' => $row['hari_perawatan'],
                ];
        }

        // dd($data_pasien);

        if (!empty($insert_dataPasien)) {
            DB::table('pasiens')->insert($insert_dataPasien);
        }
        // dd($data_pasien);
        return redirect()->route('dataRekamMedis')->with('success', 'data pasien berhasil diimport');
        // try {
        // } catch(\Throwable $e){
        //     return redirect()->back()->withError($e->getMessage());
        // } catch(\Illuminate\Database\QueryException $e){
        //     return redirect()->back()->withError($e->getMessage());
        // }
    }
}
