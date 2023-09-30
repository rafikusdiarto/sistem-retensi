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

        $dataPasien = DB::table('pasiens')
                            ->where('status','=', 'active' )
                            ->whereDate('tgl_retensi','<=', Carbon::now())
                            ->orWhere(function ($query) {
                                $query->whereDate('tgl_retensi','<=', Carbon::now()->addDays(5))
                                ->where('status','=', 'active' );
                            })
                            ->count();
                            // dd($dataPasien);
            return view('petugas.dashboard', ['pasienRetensi' => $dataPasien]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
