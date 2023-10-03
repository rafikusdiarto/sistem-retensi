<?php

namespace App\Http\Controllers\Kepala;

use App\Models\SopRetensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SopRetensiController extends Controller
{
    public function __construct(){
        $this->middleware(['role:kepala']);
    }

    public function index(){
        try {
            $sop_retensi = SopRetensi::all();
            return view('kepala.sop-retensi.index', ['sop_retensi' => $sop_retensi]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function show($id){
        try {
            $sop_retensi = SopRetensi::find($id);
            return view('kepala.sop-retensi.show', ['sop_retensi' => $sop_retensi]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function store(Request $request){
        $request->validate([
            'lampiran' => 'required|mimes:pdf,xlxs,xlx,docx,doc',
            'keterangan' => 'required'
        ],
        [
            'required' => ':attribute wajib diisi',
        ]);
        try {
            $file = $request->file('lampiran');
            $fileName = $file->getClientOriginalName();
            $filePath = 'sop_retensi/' . $fileName;
            $file->move('sop_retensi', $fileName);

            SopRetensi::insert([
                'path_sop' => $filePath,
                'filename' => $fileName,
                'keterangan' => $request->keterangan
            ]);

            return redirect()->route('sopRetensi')->with('success', 'data sop retensi berhasil ditambahkan');
            // return view('kepala.sop-retensi.index');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function download(Request $request, $file){
        try {
            return response()->download(public_path('/sop_retensi/'.$file));
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function delete($id){
        try {
            SopRetensi::find($id)->delete();
            return redirect()->route('sopRetensi')->with('success', 'data sop retensi berhasil dihapus');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
