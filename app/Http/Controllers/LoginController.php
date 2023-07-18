<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
                if ($cek->level == "pengunjung") {
                    if ($cek->email_verified == null) {
                        return back()->with("message", "Akun anda belum di verifikasi. cek email anda untuk memverifikasinya");
                    } else {
                        $request->session()->regenerate();

                        Auth::attempt(["email" => $request["email"], "password" => $request["password"]]);

                        return redirect()->intended("/");
                    }
                } else {
                    $request->session()->regenerate();
                    if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                        if ($cek->level == "pengurus") {
                            return redirect()->intended("/home");
                        } else if ($cek->level == "panitia") {
                            return redirect()->intended("/panitia/home");
                        } else if ($cek->level == "pelatih") {
                            return redirect()->intended("/pelatih/home");
                        }
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
            "required" => "Kolom :attribute Harus diisi",
            "min" => "Kolom :attribute Minimal :min Karakter",
            "max" => "Kolom :attribute Maksimal :max Karakter"
        ];

        $this->validate($request, [
            "name" => "required",
            "email" => "required",
            "alamat" => "required",
            "telepon" => "required",
            "password" => "required|min:8|max:15",
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

        $last_id = $user->id;

        $token = $last_id . hash('sha256', Str::random(120));

        $verifyUrl = url('/verify', ['token' => $token, 'service' => 'Email_Verification']);

        VerifyUser::create([
            'user_id' => $last_id,
            'token' => $token
        ]);

        $message = 'Dear <b>' . $request['name'] . '</b>';
        $message .= 'Terima Kasih telah mendaftar, kami hanya perlu anda memverifikasi alamat email anda
        untuk menyelesaikan pengaturan akun anda';

        $mail_data = [
            'recipient' => $request['email'],
            'fromEmail' => $request['email'],
            'fromName' => $request['name'],
            'subject' => 'Email Verification',
            'body' => $message,
            'actionLink' => $verifyUrl,
        ];

        Mail::send('user/landingpage/email-template', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                ->from($mail_data['fromEmail'], $mail_data['fromName'])
                ->subject($mail_data['subject']);
        });

        if ($user) {
            return back()->with('Berhasil', 'registrasi kamu sekarang berhasil. Silahkan cek email kamu untuk memverifikasi');
        } else {
            return back()->with('Gagal', 'ada masalah');
        }
    }

    public function verify(Request $request)
    {
        $token = $request->token;
        $verifyUser = VerifyUser::where("token", $token)->first();
        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->email_verified) {
                $verifyUser->user->email_verified = 1;
                $verifyUser->user->save();

                return redirect("/login")->with('info', 'Email mu berhasil di verifikasi.
                Kamu bisa login sekarang')->with('verifiedEmail', $user->email);
            } else {
                return redirect("/login")->with('peringatan', 'Email mu belum di verifikasi.
                Cek email mu untuk verifikasi')->with('verifiedEmail', $user->email);
            }
        }
    }
}
