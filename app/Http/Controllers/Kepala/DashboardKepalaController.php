<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardKepalaController extends Controller
{
    public function __construct(){
        $this->middleware(['role:kepala']);
    }

    public function index(){
        return view('kepala.dashboard');
    }
}
