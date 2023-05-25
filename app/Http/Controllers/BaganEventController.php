<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\baganevent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BaganEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baganevent = baganevent::latest()->get();
        return view('panitia.informasi.baganevent.baganevent', compact('baganevent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panitia.informasi.baganevent.create-baganevent');
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

        $dtUpload = new baganevent();
        $dtUpload->gambar = $gambar;
        $dtUpload->deskripsi = $request->deskripsi;
        $dtUpload->save();

        return redirect("/informasi/baganevent");
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
        $dt = baganevent::findorfail($id);
        return view('panitia.informasi.baganevent.edit-baganevent', compact('dt'));
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
        baganevent::where("id", $id)->update([
            "gambar" => $gambar,
            "Deskripsi" => "$request->Deskripsi"
        ]);
        return redirect("/informasi/baganevent");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        baganevent::where("id", $id)->delete();

        return back();
    }
}
