<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tentangevent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TentangEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tentangevent = tentangevent::latest()->get();
        return view('panitia.tentangevent', compact('tentangevent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panitia.create-tentangevent');
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
        
        $dtUpload = new tentangevent;
        $dtUpload->gambar = $gambar;
        $dtUpload->deskripsi = $request->deskripsi;
        $dtUpload->save();
        
        return redirect ('tentangevent');
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
        $dt = tentangevent::findorfail($id);
        return view('panitia.edit-tentangevent', compact('dt'));
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
            tentangevent::where("id", $id)->update([
            "gambar" => $gambar,
            "Deskripsi" => $request->Deskripsi
            ]);
        return redirect('tentangevent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = tentangevent::findorfail($id);

        Storage::delete($hapus->gambar);

        $hapus->delete();
        
        return back();
    }
}
