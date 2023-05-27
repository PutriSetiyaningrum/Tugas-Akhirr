<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tentangperbasi;
use Illuminate\Http\Request;

class TampilanEventController extends Controller
{
    public function tampilan()
    {
        $about_perbasi = tentangperbasi::get();
        return view('user.landingpage.tentangPERBASI',compact('about_perbasi'));
    }}
