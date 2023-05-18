<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function halamanlogin()
    {
        return view('user/landingpage/login');
    }

    public function postlogin(Request $request)
    {

        $cek = User::where("email", $request->email)->first();

        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $request->session()->regenerate();
            if ($cek->level == "pengurus") {
                return redirect()->intended("/home");
            } else if ($cek->level == "panitia") {
                return redirect()->intended("/panitia/home");
            } else if ($cek->level == "pelatih") {
                return redirect()->intended("/pelatih/home");
            } else if ($cek->level == "pengunjung") {
                return redirect()->intended("/pengunjung/home");
            }
        } else {
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function registrasi()
    {
        return view('user/landingpage/register');
    }

    public function simpanregistrasi(Request $request)
    {
        // dd($request->all());

        User::create([
            'name' => $request->name,
            'level' => 'panitia',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect('/');
    }
}
