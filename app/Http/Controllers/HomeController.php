<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('pengurus.home');
    }

    public function home(){
        return view('panitia.home');
    }

    public function pelatih(){
        return view('pelatih.home');
    }
    
    public function pengunjung(){
        return view('pengunjung.home');
    }
}
