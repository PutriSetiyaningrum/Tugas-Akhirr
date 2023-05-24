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
use App\Http\Controllers\HasilPertandinganController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\PengunjungController;
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

    // Pengurus
    Route::group(["middleware" => ["can:pengurus"]], function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        Route::prefix("akun")->group(function () {
            Route::resource('panitia', PanitiaController::class);
        });

        Route::prefix("master")->group(function () {
            // Route::resource('/contentperbasi', ContenteventController::class);
            Route::get('pengurus/home', [HomeController::class, 'index'])->name('home');
            Route::resource('/tentangperbasi', TentangperbasiController::class);
        });
    });

    // Pelatih
    Route::group(["middleware" => ["can:pelatih"]], function () {
        Route::get('pelatih/home', [HomeController::class, 'pelatih'])->name('home');
    });

    // Panitia
    Route::group(["middleware" => ["can:panitia"]], function () {
        Route::get('panitia/home', [HomeController::class, 'home'])->name('home');
    });

    // Pengunjung
    Route::group(["middleware" => ["can:pengunjung"]], function () {
        Route::get('pengunjung/home', [HomeController::class, 'pengunjung'])->name('home');
    });

    Route::prefix("akun")->group(function () {
        Route::resource('pelatih', PelatihController::class);
    });
    Route::prefix("akun")->group(function () {
        Route::resource('pengunjung', PengunjungController::class);
    });
});

Route::prefix("master")->group(function () {
    Route::resource('/event', EventController::class);
    Route::resource('/kategorievent', KategoriController::class);
    Route::resource('/jeniscabangevent', CabangController::class);
});
Route::prefix("informasi")->group(function () {
    Route::resource('/tentangevent', TentangeventController::class);
    Route::resource('/baganevent', BaganEventController::class);
    Route::resource('/hasilpertandingan', HasilpertandinganController::class);
});
