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
        $data["panitia"] = User::where("level", "pelatih")->get();
        return view('pengurus.akun.pelatih.index', $data);
    }

    public function store(Request $request)
    {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt("pelatih"),
            "level" => "pelatih",
        ]);

        return back();
    }

    public function update(Request $request, $id)
    {
        User::where("id", $id)->update([
            "name" => $request->name,
            "email" => $request->email,
        ]);

        return back();
    }

    public function destroy($id)
    {
        User::where("id", $id)->delete();

        return back();
    }
}
