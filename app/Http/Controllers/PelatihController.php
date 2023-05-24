<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PelatihController extends Controller
{
    public function index()
    {
        $data["pelatih"] = User::with('pelatih')->where('level', 'pelatih')->get();
        return view('pengurus.akun.pelatih.index', $data);
    }

    public function store(Request $request)
    {
        $users = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt("pelatih"),
            "level" => "pelatih",
        ]);

        Pelatih::create([
            'user_id' => $users->id,
            'sekolah' => $request->sekolah,
        ]);

        return back();
    }

    public function update(Request $request, $id)
    {
        User::where("id", $id)->update([
            "name" => $request->name,
            "email" => $request->email,
        ]);

        Pelatih::where("id", $id)->update([
            "sekolah" => $request->sekolah,
        ]);

        return back();
    }

    public function destroy($id)
    {
        $pelatih = Pelatih::where("user_id", $id)->first();

        User::where("id", $pelatih->user_id)->delete();

        $pelatih->delete();

        return back();
    }
}
