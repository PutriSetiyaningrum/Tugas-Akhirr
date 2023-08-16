<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AtletController;
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
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\JadwalPertandinganController;
use App\Http\Controllers\KomentarCrontroller;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
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

Route::get('/tentang-perbasi', [AppController::class, 'about'])->name('app.about');

Route::get('/syarat&panduan', function () {
    return view('/user/landingpage/syarat&panduan');
});

Route::prefix("informasi")->group(function () {
    Route::get('/tentang-event', [AppController::class, "event"]);
    Route::get('/tentang-event/{slug}', [AppController::class, 'tentang_event']);
    Route::post('/tentang-event/{slug}', [AppController::class, 'detail_event']);
    Route::get('/hasil-pertandingan', [AppController::class, "hasil_pertandingan"]);
    Route::get('/jadwal-pertandingan', [AppController::class, "jadwal_pertandingan"]);
});

Route::group(["middleware" => ["guest"]], function () {
    Route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');
    Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
    Route::get('/register', [LoginController::class, 'registrasi'])->name('registrasi');
    Route::post('/simpanregister', [LoginController::class, 'simpanregistrasi'])->name('simpanregistrasi');
    Route::get('/verify/{token}/{service}', [LoginController::class, 'verify'])->name('verify');
});

Route::group(["middleware" => ["is_user_verify_email"]], function () {
});

Route::group(["middleware" => ["autentikasi"]], function () {
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::put('/profile/update', [ProfileController::class, 'update']);
    Route::resource('profile', ProfileController::class);
    Route::post('/user/profile', [ProfileController::class, 'ubahpassword']);
    Route::post('/ubahpasswordpengunjung', [ProfileController::class, 'ubahpasspengunjung']);

    // Pengurus
    Route::group(["middleware" => ["can:pengurus"]], function () {
        Route::get('/home', [HomeController::class, 'index']);

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

        Route::resource('histori', HistoriController::class);
    });


    // Panitia
    Route::group(["middleware" => ["can:panitia"]], function () {
        Route::get('panitia/home', [HomeController::class, 'home']);

        Route::prefix("master")->group(function () {
            Route::resource('event', EventController::class);
            Route::resource('kategorievent', KategoriController::class);
            Route::resource('jeniscabangevent', CabangController::class);
        });

        Route::prefix("informasi")->group(function () {
            Route::resource('jadwalpertandingan', JadwalPertandinganController::class);
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
        Route::get('pelatih/home', [HomeController::class, 'pelatih']);
        Route::get("event", [EventController::class, "data_event"]);
        Route::get("/event/persyaratan/{id_persyaratan}/detail-persyaratan", [PersyaratanController::class, "detail"]);

        Route::get("/event/persyaratan/{id}/create", [PersyaratanController::class, "create"]);
        Route::get("/event/persyaratan/{id_event}/{id_persyaratan}/edit", [PersyaratanController::class, "edit"]);
        Route::put("/event/persyaratan/{id_event}/{id_persyaratan}/update", [PersyaratanController::class, "update"]);
        Route::post("/event/persyaratan/{id}", [PersyaratanController::class, "store"]);

        Route::post('/atlet/create-atlet', [AtletController::class, "store"]);
        Route::get('/team', [TeamController::class, "index"]);
        Route::get('/team/pilih-atlet', [TeamController::class, "create"]);
        Route::post('/team/pilih-atlet', [TeamController::class, "store"]);
        Route::get("/team/{pelatih_id}/event/{event_id}/detail", [TeamController::class, "detail"]);
        Route::resource('atlet', AtletController::class);
    });

    Route::get("/komentar_event", [EventController::class, "komentar_event"]);

    Route::get("/event/persyaratan/{id}", [EventController::class, "event_persyaratan"]);

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
        Route::resource('profil', ProfilController::class);
    });

    Route::prefix("akun")->group(function () {
        Route::resource('pelatih', PelatihController::class);
    });
});
