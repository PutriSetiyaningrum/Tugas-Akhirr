<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\tentangperbasi;

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
        $nm = $request->gambar;
        $namaFile = time().rand(100,999).".".$nm->getClientOriginalExtension();

            $dtUpload = new tentangperbasi;
            $dtUpload->gambar = $namaFile;
            $dtUpload->deskripsi = $request->deskripsi;

            $nm->move(public_path().'/img', $namaFile);
            $dtUpload->save();

            return redirect ('tentangperbasi');
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
        $ubah = tentangperbasi::findorfail($id);
        $awal = $ubah->gambar;

        $dt = [
            'gambar' => $awal,
            'Deskripsi' => $request['deskripsi'],
        ];
        $request->gambar->move(public_path().'/img', $awal);
        $ubah->update($dt);
        return redirect('tentangperbasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
