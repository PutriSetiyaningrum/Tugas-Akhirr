<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelatihController extends Controller
{
    public function index()
    {
        $data["pelatih"] = User::with('pelatih')->where('level', 'pelatih')->get();
        return view('pengurus.akun.pelatih.index', $data);
    }

    public function store(Request $request)
    {
        $messages = [
            "required" => "Kolom :attribute Harus diisi",
        ];

        $this->validate($request, [
            "name" => "required",
            "email" => "required",
            "sekolah" => "required"
        ], $messages);

        $users = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt("pelatih123"),
            "level" => "pelatih",
        ]);

        Pelatih::create([
            'user_id' => $users->id,
            'sekolah' => $request->sekolah,
        ]);

        return back()->with(
            "message",
            "<div style='margin-top: 7px'>Success Data Anda Berhasil di Tambahkan</div>"
        );
    }

    public function update(Request $request, $id)
    {
        $messages = [
            "required" => "Kolom :attribute Harus diisi",
        ];

        $this->validate($request, [
            "name_edit" => "required",
            "email_edit" => "required",
            "sekolah_edit" => "required"
        ], $messages);

        $user = User::findOrFail($id);

        $user->name = $request->name_edit;
        $user->email = $request->email_edit;

        // Simpan perubahan pada data pengguna
        $user->save();

        Pelatih::where("user_id", $id)->update([
            "sekolah" => $request["sekolah_edit"]
        ]);

        return back()->with(
            "message",
            "<div style='margin-top: 7px'>Success Data Anda Berhasil di Edit</div>"
        );
    }

    public function destroy($id)
    {
        $pelatih = Pelatih::where("user_id", $id)->first();

        User::where("id", $pelatih->user_id)->delete();

        $pelatih->delete();

        return back()->with(
            "message",
            "<div style='margin-top: 7px'>Success Data Anda Berhasil di Hapus</div>"
        );
    }
}
