<?php

namespace App\Http\Controllers\Petugas;

use Carbon\Carbon;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardPetugasController extends Controller
{
    public function __construct(){
        $this->middleware(['role:petugas']);
    }

    public function index(){
        try {
        $tanggalKadaluwarsa = Carbon::now()->subYears(5)->subDays(5);

        $dataPasien = Pasien::where('krs', '<=', $tanggalKadaluwarsa)
                            ->where('tgl_retensi','<=', Carbon::now() )
                            ->orWhere('tgl_retensi','>=', Carbon::now() )
                            ->count();
            return view('petugas.dashboard', ['pasienRetensi' => $dataPasien]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
