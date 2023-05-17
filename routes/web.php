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


Route::prefix("master")->group(function () {
    Route::resource('/event', EventController::class);
    Route::resource('/kategorievent', KategoriController::class);
    Route::resource('/jeniscabangevent', CabangController::class);
});

Route::prefix("dashboard")->group(function () {
    Route::resource('/tentangevent', TentangeventController::class);
    Route::resource('/baganevent', BaganEventController::class);
    Route::resource('/hasilpertandingan', HasilpertandinganController::class);
});

Route::get('panitia/home', [HomeController::class, 'home'])->name('home');
Route::get('pelatih/home', [HomeController::class, 'pelatih'])->name('home');
Route::get('pengunjung/home', [HomeController::class, 'pengunjung'])->name('home');

Route::group(["middleware" => ["autentikasi"]], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::prefix("dashboard")->group(function () {
        Route::get('pengurus/home', [HomeController::class, 'index'])->name('home');
        Route::resource('/tentangperbasi', TentangperbasiController::class);
    });
});
