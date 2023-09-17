<?php

namespace App\Http\Controllers\Petugas;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DataPetugasController extends Controller
{
    public function __construct(){
        $this->middleware(['role:petugas']);
    }

    public function index(){
        try {
            $petugas = User::all();
            return view('petugas.data-petugas.list', ['petugas' => $petugas]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function add(){
        try {
            return view('petugas.data-petugas.tambahdata');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jabatan' => 'required'
        ],
        [
            'required' => 'kolom wajib diisi'
        ]
    );
    try {
        $user = User::create([
           'name' => $request->nama,
           'email' => $request->email,
           'password' => Hash::make($request->password),
        ]);
            $user->assignRole($request->jabatan);
            return redirect()->route('dataPetugas')->with('success', 'data berhasil ditambahkan');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit(Request $request, $id){
        try {
            $user = User::find($id);
            return view('petugas.data-petugas.editdata', ['petugas' => $user]);
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, $id){
        try {
            User::find($id)->update([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
             ]);
             return redirect()->route('dataPetugas')->with('success', 'data berhasil diubah');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function delete($id){
        try {
            User::find($id)->delete();
            return redirect()->route('dataPetugas')->with('success', 'data berhasil dihapus');
        } catch(\Throwable $e){
            return redirect()->back()->withError($e->getMessage());
        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

}
