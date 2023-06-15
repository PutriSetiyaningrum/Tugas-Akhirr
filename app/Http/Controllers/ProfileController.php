<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelatih;
use App\Models\Pengunjung;
use App\Http\Controllers\PelatihController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('user.profile.profile', compact('user'));
    }
    public function update(Request $request)
    {
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
        } else if (Auth::user()->level == "pengunjung") {
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
        $user->save();

        return back();
    }
}
