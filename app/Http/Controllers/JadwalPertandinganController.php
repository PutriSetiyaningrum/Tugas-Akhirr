<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JadwalPertandingan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class JadwalPertandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwalpertandingan = JadwalPertandingan::latest()->get();
        return view('panitia.informasi.jadwalpertandingan.jadwalpertandingan', compact('jadwalpertandingan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panitia.informasi.jadwalpertandingan.create-jadwalpertandingan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file("gambar")) {
            $gambar = $request->file("gambar")->store("img");
        }

        $dtUpload = new JadwalPertandingan();
        $dtUpload->gambar = $gambar;
        $dtUpload->deskripsi = $request->deskripsi;
        $dtUpload->save();

        return redirect("/informasi/jadwalpertandingan")->with(
            "message",
            "<div style='margin-top: 7px'>Success Data Anda Berhasil di Tambahkan</div>"
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dt = JadwalPertandingan::findorfail($id);
        return view('panitia.informasi.jadwalpertandingan.edit-jadwalpertandingan', compact('dt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->file("gambar")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $gambar = $request->file("gambar")->store("img");
        } else {
            $gambar = $request->gambarLama;
        }
        JadwalPertandingan::where("id", $id)->update([
            "gambar" => $gambar,
            "deskripsi" => $request->deskripsi
        ]);
        return redirect("/informasi/jadwalpertandingan")->with(
            "message",
            "<div style='margin-top: 7px'>Success Data Anda Berhasil di Edit</div>"
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JadwalPertandingan::where("id", $id)->delete();

        return back()->with(
            "message",
            "<div style='margin-top: 7px'>Success Data Anda Berhasil di Hapus</div>"
        );
    }
}
