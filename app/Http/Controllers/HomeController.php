<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kategorievent;
use Illuminate\Http\Request;
use App\Models\Pelatih;
use App\Models\User;
use App\Models\Pengunjung;
use App\Models\Event;
use App\Models\Kategori;
use App\Models\Cabang;
use App\Models\BaganEvent;
use App\Models\HasilPertandingan;
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
        $baganevent = BaganEvent::count();
        $hasilpertandingan = HasilPertandingan::count();
        $persyaratan = Persyaratan::count();
        return view('panitia.home', compact('pelatih', 'event', 'kategorievent', 'jeniscabangevent', 'baganevent', 'hasilpertandingan', 'persyaratan'));
    }

    public function pelatih()
    {
        $event = event::count();
        $baganevent = BaganEvent::count();
        $hasilpertandingan = HasilPertandingan::count();
        return view('pelatih.home', compact('event', 'baganevent', 'hasilpertandingan'));
    }

    public function pengunjung()
    {
        $baganevent = BaganEvent::count();
        $hasilpertandingan = HasilPertandingan::count();
        return view('pengunjung.home', compact('baganevent', 'hasilpertandingan'));
    }
}
