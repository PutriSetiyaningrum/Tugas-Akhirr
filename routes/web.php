<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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
Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/login', [LoginController::class,'halamanlogin'])->name('login');
Route::post('/postlogin', [LoginController::class,'postlogin'])->name('postlogin');

Route::get('/pengurus/home', function (){
    return view('pengurus/home');
});