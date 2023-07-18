<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kategorievent;
use Illuminate\Http\Request;
use App\Models\Pelatih;
use App\Models\User;
use App\Models\Pengunjung;
use App\Models\event;
use App\Models\Kategori;
use App\Models\Cabang;
use App\Models\HasilPertandingan;
use App\Models\JadwalPertandingan;
use App\Models\JenisCabangEvent;
use App\Models\tentangperbasi;
use App\Models\Persyaratan;

class HomeController extends Controller
{
    public function index()
    {
        $pelatih = Pelatih::count();
        $user = User::where('level', 'panitia')->count();
        $pengunjung = Pengunjung::count();
        $tentangperbasi = tentangperbasi::count();
        $histori = Persyaratan::count();
        return view('pengurus.home', compact('pelatih', 'user', 'pengunjung', 'tentangperbasi', 'histori'));
    }

    public function home()
    {
        $pelatih = Pelatih::count();
        $event = event::count();
        $kategorievent = kategorievent::count();
        $jeniscabangevent = JenisCabangEvent::count();
        $jadwalpertandingan = JadwalPertandingan::count();
        $hasilpertandingan = HasilPertandingan::count();
        $persyaratan = Persyaratan::count();
        return view('panitia.home', compact('pelatih', 'event', 'kategorievent', 'jeniscabangevent', 'jadwalpertandingan', 'hasilpertandingan', 'persyaratan'));
    }

    public function pelatih()
    {
        $event = event::count();
        $hasilpertandingan = HasilPertandingan::count();
        return view('pelatih.home', compact('event', 'hasilpertandingan'));
    }

    public function pengunjung()
    {
        $hasilpertandingan = HasilPertandingan::count();
        return view('pengunjung.home', compact('hasilpertandingan'));
    }
}
