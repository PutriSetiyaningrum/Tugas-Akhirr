<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\event;
use App\Models\tentangperbasi;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function about()
    {
        $about_perbasi = tentangperbasi::get();
        return view('user.landingpage.tentangPERBASI', compact('about_perbasi'));
    }

    public function event()
    {
        $data["event"] = event::get();

        return view("user.landingpage.tentang-event", $data);
    }

    public function tentang_event($slug)
    {
        $data["event"] = event::where("slug", $slug)->first();

        return view("user.landingpage.detail-event", $data);
    }
}
