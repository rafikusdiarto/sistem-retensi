<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $roleUser = \Auth::user()->roles()->pluck('name')[0];
        if($roleUser == 'petugas'){
            return redirect('/dashboard-petugas');
        } elseif ($roleUser == 'kepala'){
            return redirect('/dashboard-kepala');
        }
        else {
            return redirect('/logout');
        }
    }
}
