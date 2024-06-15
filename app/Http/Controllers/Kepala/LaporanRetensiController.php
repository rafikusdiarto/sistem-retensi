<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use PDF;

class LaporanRetensiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:kepala']);
    }

    public function index(Request $request)
    {
        // $data_pasien = Pasien::where('jenis_pelayanan', $request->jenis_pelayanan)
        //     ->whereYear('krs', $request->tahun)
        //     ->where('status', $request->status)->get();
        $data_pasien = Pasien::whereYear('krs', $request->tahun)
                            ->where('status', $request->status)->get();
        if ($request->has('tahun')) {
            $data_pasien = $data_pasien->map(function ($item, $index) {
                $item['row_number'] = $index + 1;
                return $item;
            });

            session(['data_pasien' => $data_pasien]); //mengirim variabel ke controller lain
            return response()->json([
                'data_pasien' => $data_pasien,
            ]);
        }
        return view('kepala.laporan-retensi.index');
    }
    public function download(Request $request, $tahun)
    {
        try {
            $data_pasien = session('data_pasien');
            if ($data_pasien) {
                # code...
                foreach ($data_pasien as $pasien) {
                    // Periksa status pasien
                    if ($pasien['status'] == 'active') {
                        // $year = $request->$tahun;
                        // dd($tahun);
                        $total = count($data_pasien);
                        $pdf = PDF::loadview('petugas.laporan-retensi.print-active', ['pasien' => $data_pasien, 'total' => $total, 'tahun' => $tahun])->setPaper('legal');
                        return $pdf->stream('laporan-rm-aktif', array("Attachment" => false));
                    } elseif ($pasien['status'] == 'inactive') {
                        $total = count($data_pasien);
                        $pdf = PDF::loadview('petugas.laporan-retensi.print-inactive', ['pasien' => $data_pasien, 'total' => $total, 'tahun' => $tahun])->setPaper('legal');
                        return $pdf->stream('data-laporan-retensi', array("Attachment" => false));
                    }
                }
            } else {
                return redirect()->back()->with('error', 'Data laporan tidak ada');
            }
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
