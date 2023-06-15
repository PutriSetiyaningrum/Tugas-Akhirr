<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TentangperbasiController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\TentangEventController;
use App\Http\Controllers\BaganEventController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HasilPertandinganController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\ProfileController;
use Doctrine\DBAL\Driver\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/layouting", function () {
    return view("layouts.main");
});
Route::get('/', function () {
    return view('/user/landingpage/home');
});
Route::get('/s&k', function () {
    return view('/user/landingpage/s&k');
});
Route::get('/kontak', function () {
    return view('/user/landingpage/kontak');
});
Route::get('/tentang-perbasi', [AppController::class, 'about'])->name('app.about');
Route::get('/login', function () {
    return view('/user/landingpage/login');
});
Route::get('/register', function () {
    return view('/user/landingpage/register');
});
Route::get('/register', [LoginController::class, 'registrasi'])->name('registrasi');
Route::post('/simpanregister', [LoginController::class, 'simpanregistrasi'])->name('simpanregistrasi');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(["middleware" => ["guest"]], function () {
    Route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');
    Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
});


Route::group(["middleware" => ["autentikasi"]], function () {

    Route::put('/profile/update', [ProfileController::class, 'update']);
    Route::resource('profile', ProfileController::class);


    // Pengurus
    Route::group(["middleware" => ["can:pengurus"]], function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        Route::prefix("akun")->group(function () {
            Route::resource('panitia', PanitiaController::class);
        });

        Route::prefix("akun")->group(function () {
            Route::resource('pengunjung', PengunjungController::class);
        });

        Route::prefix("master")->group(function () {
            Route::resource('tentangperbasi', TentangperbasiController::class);
            Route::resource('notifikasi', NotifikasiController::class);
        });
    });


    // Panitia
    Route::group(["middleware" => ["can:panitia"]], function () {
        Route::get('panitia/home', [HomeController::class, 'home'])->name('home');

        Route::prefix("master")->group(function () {
            Route::resource('event', EventController::class);
            Route::resource('kategorievent', KategoriController::class);
            Route::resource('jeniscabangevent', CabangController::class);
        });

        Route::prefix("informasi")->group(function () {
            Route::resource('tentangevent', TentangeventController::class);
            Route::resource('baganevent', BaganEventController::class);
            Route::resource('hasilpertandingan', HasilpertandinganController::class);
        });

        Route::get("/persyaratan/event/{id_event}/persyaratan/{id_persyaratan}/edit", [PersyaratanController::class, "edit"]);
        Route::put("/persyaratan/event/{id_event}/persyaratan/{id_persyaratan}", [PersyaratanController::class, "update"]);
        Route::delete("/persyaratan/event/{id_event}/persyaratan/{id_persyaratan}/destroy", [PersyaratanController::class, "destroy"]);

        Route::get("/persyaratan/{id}/ubah_status", [PersyaratanController::class, "view_status"]);
        Route::get("/persyaratan/{id}/detail", [PersyaratanController::class, "detail_event"]);
        Route::put('/persyaratan/{id}/status', [PersyaratanController::class, "ubah_status"]);
        Route::resource('persyaratan', PersyaratanController::class);
    });

    // Pelatih
    Route::group(["middleware" => ["can:pelatih"]], function () {
        Route::get('pelatih/home', [HomeController::class, 'pelatih'])->name('home');
        Route::get("event", [EventController::class, "data_event"]);
        Route::get("/event/persyaratan/{id_persyaratan}/detail-persyaratan", [PersyaratanController::class, "detail"]);
        Route::get("/event/persyaratan/{id}", [EventController::class, "event_persyaratan"]);
        Route::get("/event/persyaratan/{id}/create", [PersyaratanController::class, "create"]);
        Route::get("/event/persyaratan/{id_event}/{id_persyaratan}/edit", [PersyaratanController::class, "edit"]);
        Route::put("/event/persyaratan/{id_event}/{id_persyaratan}/update", [PersyaratanController::class, "update"]);
        Route::post("/event/persyaratan/{id}", [PersyaratanController::class, "store"]);
    });
    Route::prefix("berita")->group(function () {
        Route::get('/tentangevent', function () {
            return view('/pelatih/berita/tentangevent');
        });

        Route::get("baganevent", [BaganEventController::class, "data_baganevent"]);
        Route::get("hasilpertandingan", [HasilPertandinganController::class, "data_hasilpertandingan"]);
    });

    Route::prefix("persyaratan")->group(function () {
        Route::prefix("file")->group(function () {
            Route::get("/{id}/surat_rekomendasi", [FileController::class, "surat_rekomendasi"]);
            Route::get("/{id}/form_pendaftaran", [FileController::class, "form_pendaftaran"]);
            Route::get("/{id}/foto", [FileController::class, "foto"]);
            Route::get("/{id}/ijazah", [FileController::class, "ijazah"]);
            Route::get("/{id}/akte", [FileController::class, "akte"]);
            Route::get("/{id}/logo_sekolah", [FileController::class, "logo_sekolah"]);
        });
    });


    // Pengunjung
    Route::group(["middleware" => ["can:pengunjung"]], function () {
        Route::get('pengunjung/home', [HomeController::class, 'pengunjung'])->name('home');
    });

    Route::prefix("akun")->group(function () {
        Route::resource('pelatih', PelatihController::class);
    });
});
