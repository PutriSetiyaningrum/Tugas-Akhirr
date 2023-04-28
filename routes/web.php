<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
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
Route::get('pelatih/home', [HomeController::class,'pelatih'])->name('home');
Route::get('pengunjung/home', [HomeController::class,'pengunjung'])->name('home');
Route::group(["middleware" => "autentikasi"], function () {
    Route::get('pengurus/home', [HomeController::class,'index'])->name('home');
    });

