<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use App\Models\StatistikRetensi;
use Illuminate\Http\Request;

class StatistikRetensiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:kepala']);
    }
    public function index()
    {
        $data = StatistikRetensi::all();
        $dataPaginate = StatistikRetensi::paginate(2);
        // $filteredData = StatistikRetensi::whereBetween(\DB::raw('tahun'), [$request->tahun1, $request->tahun2])->get();
        return view('kepala.statistik-retensi.index', [
            'data' => $data,
            'dataPaginate' => $dataPaginate
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|numeric',
            'jumlah' => 'required|numeric',
        ], [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa numerik',
        ]);
        try {
            StatistikRetensi::create($request->all());
            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|numeric',
            'jumlah' => 'required|numeric',
        ], [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa numerik',
        ]);
        try {
            StatistikRetensi::find($id)->update($request->all());
            return redirect()->back()->with('success', 'Data berhasil diubah');
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            StatistikRetensi::find($id)->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

}
