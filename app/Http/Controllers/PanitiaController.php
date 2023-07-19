<?php

namespace App\Http\Controllers;

use App\Models\Panitia;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PanitiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["panitia"] = User::where("level", "panitia")->get();
        return view('pengurus.akun.panitia.index', $data);
    }

    public function store(Request $request)
    {
        $messages = [
            "required" => "Kolom :attribute Harus diisi",
        ];

        $this->validate($request, [
            "name" => "required",
            "email" => "required"
        ], $messages);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt("panitia123"),
            "level" => "panitia",
        ]);

        return back()->with(
            "message",
            "<div style='margin-top: 7px'>Success Data Anda Berhasil di Tambahkan</div>"
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Panitia  $panitia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            "required" => "Kolom :attribute Harus Diisi"
        ];

        $this->validate($request, [
            "name_edit" => "required",
            'email_edit' => "required"
        ], $messages);

        User::where("id", $id)->update([
            "name" => $request->name_edit,
            "email" => $request->email_edit,
        ]);

        return back()->with(
            "message",
            "<div style='margin-top: 7px'>Success Data Anda Berhasil di Edit</div>"
        );
    }

    public function destroy($id)
    {
        User::where("id", $id)->delete();

        return back()->with(
            "message",
            "<div style='margin-top: 7px'>Success Data Anda Berhasil di Hapus</div>"
        );
    }
}
