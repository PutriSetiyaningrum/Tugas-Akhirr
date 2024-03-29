<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\event;
use App\Models\JenisCabangEvent;
use Illuminate\Support\Facades\Storage;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeniscabangevent = JenisCabangEvent::latest()->get();
        return view('panitia.master.jeniscabang.jeniscabangevent', compact('jeniscabangevent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panitia.master.jeniscabang.create-jeniscabangevent');
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
            "Nama_Jenis_Cabang_Event" => "required"
        ], $messages);

        $dtUpload = new jeniscabangevent;
        $dtUpload->Nama_Jenis_Cabang_Event = $request->Nama_Jenis_Cabang_Event;
        $dtUpload->save();

        return redirect("/master/jeniscabangevent")->with(
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
        $dt = jeniscabangevent::findorfail($id);
        return view('panitia.master.jeniscabang.edit-jeniscabangevent', compact('dt'));
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
            "Nama_Jenis_Cabang_Event" => "required"
        ], $messages);

        jeniscabangevent::where("id", $id)->update([
            "Nama_Jenis_Cabang_Event" => $request->Nama_Jenis_Cabang_Event
        ]);
        return redirect("/master/jeniscabangevent")->with(
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
        jeniscabangevent::where("id", $id)->delete();

        return back()->with(
            "message",
            "<div style='margin-top: 7px'>Success Data Anda Berhasil di Hapus</div>"
        );
    }
}
