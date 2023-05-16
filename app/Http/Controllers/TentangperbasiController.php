<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\tentangperbasi;
use Illuminate\Support\Facades\Storage;

class TentangperbasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tentangperbasi = tentangperbasi::latest()->get();
        return view('pengurus.tentangperbasi', compact('tentangperbasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengurus.create-tentangperbasi');
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

        $dtUpload = new tentangperbasi;
        $dtUpload->gambar = $gambar;
        $dtUpload->deskripsi = $request->deskripsi;
        $dtUpload->save();

        return redirect("/home/tentangperbasi");
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
        $dt = tentangperbasi::findorfail($id);
        return view('pengurus.edit-tentangperbasi', compact('dt'));
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
        tentangperbasi::where("id", $id)->update([
            "gambar" => $gambar,
            "Deskripsi" => $request->Deskripsi
        ]);
        return redirect("/home/tentangperbasi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tentangperbasi::where("id", $id)->delete();

        return back();
    }
}
