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
        $data_pasien = Pasien::where('jenis_pelayanan', $request->jenis_pelayanan)
            ->whereYear('tgl_retensi', $request->tahun)
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
    public function download(Request $request)
    {
        try {
            $data_pasien = session('data_pasien');
            $total = count($data_pasien);
            $pdf = PDF::loadview('kepala.laporan-retensi.print', ['pasien' => $data_pasien, 'total' => $total])->setPaper('legal');
            return $pdf->stream('data-retensi', array("Attachment" => false));
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
