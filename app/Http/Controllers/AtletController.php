<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atlet;
use Illuminate\Support\Facades\Auth;

class AtletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $atlet = Atlet::where('pelatih_id', $user->pelatih->id)->latest()->get();
        return view('pelatih.atlet.atlet', compact('atlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelatih.atlet.create-atlet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            "required" => "Kolom :attribute Harus diisi"
        ];

        $this->validate($request, [
            "nama" => "required",
            "tanggal_lahir" => "required",
            "posisi" => "required",
        ], $messages);

        $dtUpload = new Atlet();
        $dtUpload->nama = $request->nama;
        $dtUpload->tanggal_lahir = $request->tanggal_lahir;
        $dtUpload->posisi = $request->posisi;
        $dtUpload->pelatih_id = Auth::user()->pelatih->id;
        $dtUpload->save();

        return redirect("/atlet")->with(
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
        $dt = Atlet::findorfail($id);
        return view('pelatih.atlet.edit-atlet', compact('dt'));
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
        $messages = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($request, [
            "nama" => "required",
            "tanggal_lahir" => "required",
            "posisi" => "required"
        ], $messages);

        Atlet::where("id", $id)->update([
            "nama" => $request->nama,
            "tanggal_lahir" => $request->tanggal_lahir,
            "posisi" => $request->posisi
        ]);
        return redirect("/atlet")->with(
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
        Atlet::where("id", $id)->delete();

        return back()->with(
            "message",
            "<div style='margin-top: 7px'>Success Data Anda Berhasil di Hapus</div>"
        );
    }
}
