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
            $data_pasien = Pasien::where('status', '=', 'inactive')->get();
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

            $selectedItems = $request->input('checked');
            $data_pasien = Pasien::where('status', '=', 'inactive')->get();

            // dd($selectedItems);
            // dd($data_pasien);
            if ($selectedItems == 0) {
                $pdf = PDF::loadview('petugas.data-retensi.print', ['pasien' => $data_pasien])->setPaper('legal');
            } else {
                $filteredData = $data_pasien->reject(function ($item) use ($selectedItems) {
                    return in_array($item->id, $selectedItems);
                });
                $pdf = PDF::loadview('petugas.data-retensi.print', ['pasien' => $filteredData])->setPaper('legal');
            }

            return $pdf->stream('data-retensi', array("Attachment" => false));
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function search(Request $request){
        try {
            $start_date = $request->start_date;
            $end_date = $request->end_date;

            $pasien = Pasien::whereDate('krs', '>=', $start_date)
                            ->whereDate('krs', '<=', $end_date)
                            ->where('status', 'inactive')
                            ->get();
            // dd($pasien);
            return view('petugas.data-retensi.list', ['pasien' => $pasien]);

        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, $id){
        try {

            Pasien::findOrFail($id)
            // DB::table('pasiens')
            //     ->where('id','=',$id)
                ->update([
                    'status'=>$request->status
                ]);
            return response()->json([
                'success' => true,
            ]);

        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

}
