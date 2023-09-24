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
use PDF;

class DataRetensiController extends Controller
{
    public function __construct(){
        $this->middleware(['role:petugas']);
    }

    public function index(){
        try {
            $data_pasien = Pasien::all();
            // dd($data_pasien);
            return view('petugas.data-retensi.list', ['pasien' => $data_pasien]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function print(Request $request){
        try {
            $data_pasien = Pasien::all();
            $pdf = PDF::loadview('petugas.data-retensi.print', ['pasien' => $data_pasien])->setPaper('legal');
            return $pdf->stream('data-retensi', array("Attachment" => false));
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
