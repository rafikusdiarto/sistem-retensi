<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\BeritaAcara;
use App\Models\BeritaAcaraLampirans;
use Illuminate\Http\Request;

class BeritaAcaraPetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:petugas']);
    }

    public function index()
    {
        try {
            $data = BeritaAcara::all();
            return view('petugas.berita-acara.index', [
                'data' => $data
            ]);
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function create()
    {
        try {
            $user = \Auth::user();
            return view('petugas.berita-acara.create', [
                'user' => $user
            ]);
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'jabatan' => 'required',
            'cara_pemusnahan' => 'required',
            'tanggal_pemusnahan' => 'required',
            'waktu_pemusnahan' => 'required',
            'lokasi_pemusnahan' => 'required',
            'ketua_rekam_medis' => 'required',
            'lampiran' => 'required|array',
            'lampiran.*' => 'mimes:pdf',
        ], [
            'required' => ':attribute wajib diisi',
            'mimes' => 'lampiran harus berupa file .pdf',
        ]);
        try {
            $beritaAcara = BeritaAcara::create([
                'user_id' => \Auth::user()->id,
                'cara_pemusnahan' => $request->cara_pemusnahan,
                'tanggal_pemusnahan' => $request->tanggal_pemusnahan,
                'waktu_pemusnahan' => $request->waktu_pemusnahan,
                'lokasi_pemusnahan' => $request->lokasi_pemusnahan,
                'ketua_rm' => $request->ketua_rekam_medis,
            ]);


            if ($request->hasFile('lampiran')) {
                $files = $request->file('lampiran');
                foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    BeritaAcaraLampirans::create([
                        'berita_acara_id' => $beritaAcara->id,
                        'filename' => $filename
                    ]);
                }
            }
            return redirect()->route('beritaAcara')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $data = BeritaAcara::find($id);
            return view('petugas.berita-acara.edit', [
                'data' => $data
            ]);
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'jabatan' => 'required',
            'cara_pemusnahan' => 'required',
            'tanggal_pemusnahan' => 'required',
            'waktu_pemusnahan' => 'required',
            'lokasi_pemusnahan' => 'required',
            'ketua_rm' => 'required',
            'lampiran' => 'required',
        ], [
            'required' => ':attribute wajib diisi',
            'mimes' => 'lampiran harus berupa file .pdf',
        ]);
        try {
            $beritaAcara = BeritaAcara::find($id)->update([
                'user_id' => \Auth::user()->id,
                'cara_pemusnahan' => $request->cara_pemusnahan,
                'tanggal_pemusnahan' => $request->tanggal_pemusnahan,
                'waktu_pemusnahan' => $request->waktu_pemusnahan,
                'lokasi_pemusnahan' => $request->lokasi_pemusnahan,
                'ketua_rm' => $request->ketua_rm,
            ]);

            BeritaAcaraLampirans::where('berita_acara_id', $id)->delete();

            if ($request->hasFile('lampiran')) {
                $files = $request->file('lampiran');
                foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    BeritaAcaraLampirans::create([
                        'berita_acara_id' => $id,
                        'filename' => $filename
                    ]);
                }
            }

            return redirect()->route('beritaAcara')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            BeritaAcara::find($id)->delete();
            return redirect()->route('beritaAcara')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}