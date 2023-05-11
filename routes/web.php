<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TentangperbasiController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\TentangEventController;
use App\Http\Controllers\BaganEventController;
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


Route::get('/', function () {return view('/user/landingpage/home');});
Route::get('/s&k', function () {return view('/user/landingpage/s&k');});
Route::get('/kontak', function () {return view('/user/landingpage/kontak');});
Route::get('/login', function () {return view('/user/landingpage/login');});
Route::get('/register', function () {return view('/user/landingpage/register');});
Route::get('/register', [LoginController::class,'registrasi'])->name('registrasi');
Route::post('/simpanregister', [LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');
Route::get('/login', [LoginController::class,'halamanlogin'])->name('login');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::post('/postlogin', [LoginController::class,'postlogin'])->name('postlogin');
Route::get('/home', [HomeController::class,'index'])->name('home');

Route::get('panitia/home', [HomeController::class,'home'])->name('home');
Route::resource('/event', EventController::class);
Route::get('/create-event', [EventController::class,'create'])->name('create-event');
Route::post('/simpan-event', [EventController::class,'store'])->name('simpan-event');
Route::get('/edit-event/{id}', [EventController::class,'edit'])->name('edit-event');
Route::post('/update-event/{id}', [EventController::class,'update'])->name('update-event');
Route::get('/delete-event/{id}', [EventController::class,'destroy'])->name('delete-event');
Route::resource('/kategorievent', KategoriController::class);
Route::get('/create-kategorievent', [KategoriController::class,'create'])->name('create-kategorievent');
Route::post('/simpan-kategorievent', [KategoriController::class,'store'])->name('simpan-kategorievent');
Route::get('/edit-kategorievent/{id}', [KategoriController::class,'edit'])->name('edit-kategorievent');
Route::post('/update-kategorievent/{id}', [KategoriController::class,'update'])->name('update-kategorievent');
Route::get('/delete-kategorievent/{id}', [KategoriController::class,'destroy'])->name('delete-kategorievent');
Route::resource('/jeniscabangevent', CabangController::class);
Route::get('/create-jeniscabangevent', [CabangController::class,'create'])->name('create-jeniscabangevent');
Route::post('/simpan-jeniscaangevent', [CabangController::class,'store'])->name('simpan-jeniscabangevent');
Route::get('/edit-jeniscabangevent/{id}', [CabangController::class,'edit'])->name('edit-jeniscabangevent');
Route::post('/update-jeniscabangevent/{id}', [CabangController::class,'update'])->name('update-jeniscabangevent');
Route::get('/delete-jeniscabangevent/{id}', [CabangController::class,'destroy'])->name('delete-jeniscabangevent');
Route::resource('/tentangevent', TentangeventController::class);
Route::get('/create-tentangevent', [TentangeventController::class,'create'])->name('create-tentangevent');
Route::post('/simpan-tentangevent', [TentangeventController::class,'store'])->name('simpan-tentangevent');
Route::get('/edit-tentangevent/{id}', [TentangeventController::class,'edit'])->name('edit-tentangevent');
Route::post('/update-tentangevent/{id}', [TentangeventController::class,'update'])->name('update-tentangevent');
Route::get('/delete-tentangevent/{id}', [TentangeventController::class,'destroy'])->name('delete-tentangevent');
Route::resource('/baganevent', BaganEventController::class);
Route::get('/create-baganevent', [BaganEventController::class,'create'])->name('create-baganevent');
Route::post('/simpan-baganevent', [BaganEventController::class,'store'])->name('simpan-baganevent');
Route::get('/edit-baganevent/{id}', [BaganEventController::class,'edit'])->name('edit-baganevent');
Route::post('/update-baganevent/{id}', [BaganEventController::class,'update'])->name('update-baganevent');
Route::get('/delete-baganevent/{id}', [BaganEventController::class,'destroy'])->name('delete-baganevent');

Route::get('pelatih/home', [HomeController::class,'pelatih'])->name('home');
Route::get('pengunjung/home', [HomeController::class,'pengunjung'])->name('home');

Route::group(["middleware" => "autentikasi"], function () {
    Route::get('pengurus/home', [HomeController::class,'index'])->name('home');
    Route::resource('/tentangperbasi', TentangperbasiController::class);
    Route::get('/create-tentangperbasi', [TentangperbasiController::class,'create'])->name('create-tentangperbasi');
    Route::post('/simpan-tentangperbasi', [TentangperbasiController::class,'store'])->name('simpan-tentangperbasi');
    Route::get('/edit-tentangperbasi/{id}', [TentangperbasiController::class,'edit'])->name('edit-tentangperbasi');
    Route::post('/update-tentangperbasi/{id}', [TentangperbasiController::class,'update'])->name('update-tentangperbasi');
    Route::get('/delete-tentangperbasi/{id}', [TentangperbasiController::class,'destroy'])->name('delete-tentangperbasi');
    });


