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
use App\Models\TentangEvent;
use App\Models\BaganEvent;
use App\Models\HasilPertandingan;
use App\Models\JenisCabangEvent;
use App\Models\tentangperbasi;

class HomeController extends Controller
{
    public function index()
    {
        $pelatih = Pelatih::count();
        $user = User::where('level', 'panitia')->count();
        $pengunjung = Pengunjung::count();
        $tentangperbasi = tentangperbasi::count();
        return view('pengurus.home', compact('pelatih', 'user', 'pengunjung', 'tentangperbasi'));
    }

    public function home()
    {
        $pelatih = Pelatih::count();
        $event = event::count();
        $kategorievent = kategorievent::count();
        $jeniscabangevent = JenisCabangEvent::count();
        $tentangevent = TentangEvent::count();
        $baganevent = BaganEvent::count();
        $hasilpertandingan = HasilPertandingan::count();
        return view('panitia.home', compact('pelatih', 'event', 'kategorievent', 'jeniscabangevent', 'tentangevent', 'baganevent', 'hasilpertandingan'));
    }

    public function pelatih()
    {
        $event = event::count();
        $tentangevent = TentangEvent::count();
        $baganevent = BaganEvent::count();
        $hasilpertandingan = HasilPertandingan::count();
        return view('pelatih.home', compact('event', 'tentangevent', 'baganevent', 'hasilpertandingan'));
    }

    public function pengunjung()
    {
        $tentangevent = TentangEvent::count();
        $baganevent = BaganEvent::count();
        $hasilpertandingan = HasilPertandingan::count();
        return view('pengunjung.home', compact('tentangevent', 'baganevent', 'hasilpertandingan'));
    }
}
