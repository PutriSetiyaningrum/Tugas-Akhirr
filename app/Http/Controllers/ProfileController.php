<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengunjung;
use App\Models\Pelatih;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('user.profile.profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        if ((Auth::user()->level == "panitia") || (Auth::user()->level == "pengurus")) {
            $this->validate($request, [
                "name" => "required",
                "email" => "required"
            ], $messages);
        } else if (Auth::user()->level == "pelatih") {
            $this->validate($request, [
                "name" => "required",
                "email" => "required",
                "sekolah" => "required"
            ], $messages);
        }

        $user = User::where("id", Auth::user()->id)->first();

        if (Auth::user()->level == "pengurus") {
            if (!$request->file("foto")) {
            } else {
                if (empty($user["foto"])) {
                    if ($request->file("foto")) {
                        $data = $request->file("foto")->store("profil_pengurus");

                        $user->foto = $data;
                    }
                } else {
                    if ($request->file("foto")) {
                        Storage::delete($user->foto);

                        $data = $request->file("foto")->store("profil_pengurus");

                        $user->foto = $data;
                    }
                }
            }
        } else if (Auth::user()->level == "panitia") {
            if (!$request->file("foto")) {
            } else {
                if (empty($user["foto"])) {
                    if ($request->file("foto")) {
                        $data = $request->file("foto")->store("profil_panitia");

                        $user->foto = $data;
                    }
                } else {
                    if ($request->file("foto")) {
                        Storage::delete($user->foto);

                        $data = $request->file("foto")->store("profil_panitia");

                        $user->foto = $data;
                    }
                }
            }
        } else if (Auth::user()->level == "pelatih") {
            if (!$request->file("foto")) {
            } else {
                if (empty($user["foto"])) {
                    if ($request->file("foto")) {
                        $data = $request->file("foto")->store("profil_pelatih");

                        $user->foto = $data;
                    }
                } else {
                    if ($request->file("foto")) {
                        Storage::delete($user->foto);

                        $data = $request->file("foto")->store("profil_pelatih");

                        $user->foto = $data;
                    }
                }
            }

            Pelatih::where("user_id", Auth::user()->id)->update([
                "sekolah" => $request["sekolah"]
            ]);
        } else if (Auth::user()->level == "pengunjung") {

            $this->validate($request, [
                "name" => "required",
                "email" => "required",
                "telepon" => "required",
                "alamat" => "required"
            ], $messages);

            if (!$request->file("foto")) {
            } else {
                if (empty($user["foto"])) {
                    if ($request->file("foto")) {
                        $data = $request->file("foto")->store("profil_pengunjung");

                        $user->foto = $data;
                    }
                } else {
                    if ($request->file("foto")) {
                        Storage::delete($user->foto);

                        $data = $request->file("foto")->store("profil_pengunjung");

                        $user->foto = $data;
                    }
                }
            }
            Pengunjung::where("user_id", $user["id"])->update([
                "alamat" => $request->alamat,
                "telepon" => $request->telepon
            ]);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->with(
            "message",
            "<div style='margin-top: 7px'>Profil Anda Berhasil di Edit</div>"
        );
    }

    public function ubahpassword(Request $request)
    {
        $messages = [
            "required" => "Kolom :attribute Harus Diisi"
        ];

        $this->validate($request, [
            "passwordlama" => "required",
            "passwordbaru" => "required|min:8|max:15",
            "konfirpass" => "required"
        ], $messages);

        if ($request->passwordbaru != $request->konfirpass) {
            return back()->with("error", "Konfirmasi Password Tidak Sesuai");
        } else {
            User::where("id", Auth::user()->id)->update([
                "password" => bcrypt($request->passwordbaru)
            ]);

            return back()->with("sukses", "Password Kami Berhasil di Ubah");
        }
    }

    public function ubahpasspengunjung(Request $request)
    {
        $messages = [
            "required" => "Kolom :attribute Harus Diisi"
        ];

        $this->validate($request, [
            "passwordsekarang" => "required",
            "passwordbaru" => "required|min:8|max:15",
            "konfirpassword" => "required"
        ], $messages);

        if ($request->passwordbaru != $request->konfirpassword) {
            return back()->with("error", "Konfirmasi Password Tidak Sesuai");
        } else {
            User::where("id", Auth::user()->id)->update([
                "password" => bcrypt($request->passwordbaru)
            ]);

            return back()->with("sukses", "Password Kamu Berhasil di Ubah");
        }
    }
}
