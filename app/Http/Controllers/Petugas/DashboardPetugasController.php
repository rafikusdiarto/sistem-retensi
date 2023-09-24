<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class DashboardPetugasController extends Controller
{
    public function __construct(){
        $this->middleware(['role:petugas']);
    }

    public function index(){
        try {
            $today = \Carbon\Carbon::now();
            $fiveYearsAgo = $today->copy()->subYears(5);
            $fiveDaysAgo = $today->copy()->subYears(5)->subDays(5);

            $pasienRetensi = Pasien::where('krs', '<=', $today)
            ->where('krs', '<=', $fiveYearsAgo)
            ->where('krs', '>=', $fiveDaysAgo)
            // ->where('krs', '>', [$fiveYearsAgo, $today])
            ->count();
            // dd($pasienRetensi);
            // h-5 KRS bukan h-5 today
            // nambah kolom tanggal kadaluwarsa ketika tambah data
            return view('petugas.dashboard', ['pasienRetensi' => $pasienRetensi]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
