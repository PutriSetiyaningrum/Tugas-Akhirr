<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tentangperbasi;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function about()
    {
        $about_perbasi = tentangperbasi::get();
        return view('user.landingpage.tentangPERBASI',compact('about_perbasi'));
    }
}
