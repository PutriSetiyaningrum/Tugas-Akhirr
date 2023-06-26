<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CounterArtikel;
use App\Models\event;
use App\Models\hasilpertandingan;
use App\Models\tentangperbasi;
use App\Models\Komentar;
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

        CounterArtikel::create(["id_event" => $data["event"]["id"], "address" => $_SERVER["REMOTE_ADDR"]]);

        return view("user.landingpage.detail-event", $data);
    }

    public function detail_event(Request $request)
    {
        $request->request->add(['user_id' => auth()->user()->id]);
        $komentar = Komentar::create($request->all());

        return redirect()->back()->with(
            "message",
            "<div style='margin-top: 7px'>Success Komentar Anda Berhasil di Tambahkan</div>"
        );
    }

    public function jadwal_pertandingan()
    {
        $data["jadwalpertandingan"] = hasilpertandingan::get();

        return view("user.landingpage.jadwal-pertandingan", $data);
    }

    public function hasil_pertandingan()
    {
        $data["hasilpertandingan"] = hasilpertandingan::orderBy("created_at", "DESC")->get();

        return view("user.landingpage.hasil-pertandingan", $data);
    }
}
