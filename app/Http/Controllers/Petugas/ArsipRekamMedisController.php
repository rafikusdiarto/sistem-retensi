<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Arsip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArsipRekamMedisController extends Controller
{
    public function __construct(){
        $this->middleware(['role:petugas']);
    }

    public function index(){
        try {
            $arsip = Arsip::all();
            return view('petugas.arsip-rm.list', ['arsip' => $arsip]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function add(){
        try {
            return view('petugas.arsip-rm.tambahdata');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit($id){
        try {
            $arsip = Arsip::find($id);
            return view('petugas.arsip-rm.edit', ['arsip' => $arsip]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function store(Request $request){
        $request->validate([
            'lampiran' => 'required|mimes:pdf,xlxs,xlx,docx,doc',
            'no_rm' => 'required'
        ],
        [
            'required' => ':attribute wajib diisi',
        ]);
        try {
            $file = $request->file('lampiran');
            $fileName = $file->getClientOriginalName();
            $filePath = 'arsip_rm/' . $fileName;
            $file->move('arsip_rm', $fileName);

            Arsip::insert([
                'path_arsip' => $filePath,
                'filename' => $fileName,
                'no_rm' => $request->no_rm
            ]);

            return redirect()->route('arsipRekamMedis')->with('success', 'data rekam medis simpan berhasil ditambahkan');
            // return view('petugas.sop-retensi.index');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, $id){
        $request->validate([
            'lampiran' => 'nullable|mimes:pdf,xlxs,xlx,docx,doc',
            'no_rm' => 'required'
        ],
        [
            'required' => ':attribute wajib diisi',
        ]);
        try {
            $arsip = Arsip::findOrFail($id);
            if($request->hasFile('lampiran') && $request->file('lampiran')->isValid()){
                if (file_exists(( $arsip->path_arsip))) {
                    unlink(( $arsip->path_arsip));
                }
                $file = $request->file('lampiran');
                $fileName = $file->getClientOriginalName();
                $filePath = 'arsip_rm/' . $fileName;
                $file->move('arsip_rm', $fileName);
            } else {
                $filePath = $arsip->path_arsip;
                $fileName = $arsip->filename;
            }

            $arsip->update([
                'path_arsip' => $filePath,
                'filename' => $fileName,
                'no_rm' => $request->no_rm
            ]);

            return redirect()->route('arsipRekamMedis')->with('success', 'data rekam medis simpan berhasil diubah');
            // return view('petugas.sop-retensi.index');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function delete($id){
        try {
            $arsip = Arsip::find($id);
            if (file_exists(( $arsip->path_arsip))) {
                unlink(( $arsip->path_arsip));
            }
            $arsip->delete();
            return redirect()->route('arsipRekamMedis')->with('success', 'data rekam medis simpan berhasil dihapus');
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

    public function deleteFileArsip(Request $request, $id){
        try {
            $arsip = Arsip::find($id);
            if (file_exists(( $arsip->path_arsip))) {
                unlink(( $arsip->path_arsip));
            }

            $arsip->update([
                'path_arsip'=> null,
            ]);

            return redirect()->back()->with('success', 'arsip rekam medis berhasil dihapus');

        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

}
