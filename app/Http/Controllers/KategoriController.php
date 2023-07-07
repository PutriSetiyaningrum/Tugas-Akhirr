<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\kategorievent;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorievent = kategorievent::latest()->get();
        return view('panitia.master.kategori.kategorievent', compact('kategorievent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panitia.master.kategori.create-kategorievent');
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
            "Nama_Kategori_Event" => "required"
        ], $messages);

        $dtUpload = new kategorievent;
        $dtUpload->Nama_Kategori_Event = $request->Nama_Kategori_Event;
        $dtUpload->save();

        return redirect("/master/kategorievent")->with(
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
        $dt = kategorievent::findorfail($id);
        return view('panitia.master.kategori.edit-kategorievent', compact('dt'));
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
            "required" => "Kolom :attribute Data tidak boleh kosong"
        ];

        $this->validate($request, [
            "Nama_Kategori_Event" => "required"
        ], $messages);

        kategorievent::where("id", $id)->update([
            "Nama_Kategori_Event" => $request->Nama_Kategori_Event
        ]);
        return redirect("/master/kategorievent")->with(
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
        kategorievent::where("id", $id)->delete();

        return back()->with(
            "message",
            "<div style='margin-top: 7px'>Success Data Anda Berhasil di Hapus</div>"
        );
    }
}
