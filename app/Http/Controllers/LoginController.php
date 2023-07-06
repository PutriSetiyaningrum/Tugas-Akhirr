<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function halamanlogin()
    {
        return view('user/landingpage/login');
    }

    public function postlogin(Request $request)
    {
        $messages = [
            "required" => "Kolom :attribute Harus Diisi",
            "min" => "Kolom :attribute Harus :min Digit",
            "max" => "Kolom :attribute Harus :max Digit"
        ];

        $this->validate($request, [
            "email" => "required",
            "password" => "required|min:8|max:15"
        ], $messages);

        $cek = User::where("email", $request->email)->first();

        if ($cek) {
            if (Hash::check($request->password, $cek->password)) {
                $request->session()->regenerate();
                if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                    if ($cek->level == "pengurus") {
                        return redirect()->intended("/home");
                    } else if ($cek->level == "panitia") {
                        return redirect()->intended("/panitia/home");
                    } else if ($cek->level == "pelatih") {
                        return redirect()->intended("/pelatih/home");
                    } else if ($cek->level == "pengunjung") {
                        return redirect()->intended("/");
                    }
                }
            } else {
                return back()->withInput()->with("message", "Password Salah"); // Password Salah dan Email Benar
            }
        } else {
            return back()->withInput()->with("message", "Email Tidak Ditemukan"); // Email Tidak Ditemukan;
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
        $messages = [
            "required" => "Kolom :attribute Harus diisi"
        ];

        $this->validate($request, [
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "alamat" => "required",
            "telepon" => "required"
        ], $messages);

        $user = User::create([
            'name' => $request->name,
            'level' => 'pengunjung',
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Pengunjung::create([
            "user_id" => $user->id,
            "alamat" => $request->alamat,
            "telepon" => $request->telepon
        ]);

        return redirect('/');
    }
}
