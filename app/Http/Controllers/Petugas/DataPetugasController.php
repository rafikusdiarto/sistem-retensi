<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPetugasController extends Controller
{
    public function __construct(){
        $this->middleware(['role:petugas']);
    }

    public function index(){
        return view('petugas.datapetugas');
    }
}
