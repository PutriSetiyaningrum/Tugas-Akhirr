<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\event;
use App\Models\Persyaratan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $event = event::get();

        return view('panitia.master.event.event', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panitia.master.event.create-event');
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

        $dtUpload = new event;
        $dtUpload->Nama_Event = $request->Nama_Event;
        $dtUpload->slug = Str::slug($request->Nama_Event);
        $dtUpload->mulai = $request->mulai;
        $dtUpload->selesai = $request->selesai;
        $dtUpload->gambar = $gambar;
        $dtUpload->deskripsi = $request->deskripsi;
        $dtUpload->user_id = Auth::user()->id;
        $dtUpload->save();

        return redirect("/master/event")->with(
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
        $data["persyaratan"] = Persyaratan::where("id", decrypt($id))->withTrashed()->first();

        return view("panitia.master.event.detail-event", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dt = event::findorfail($id);
        return view('panitia.master.event.edit-event', compact('dt'));
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
        event::where("id", $id)->update([
            "Nama_Event" => $request->Nama_Event,
            "mulai" => $request->mulai,
            "selesai" => $request->selesai,
            "gambar" => $gambar,
            "deskripsi" => $request->deskripsi

        ]);
        return redirect("/master/event")->with(
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
        event::where("id", $id)->delete();

        return back()->with(
            "message",
            "<div style='margin-top: 7px'>Success Data Anda Berhasil di Hapus</div>"
        );
    }

    public function data_event()
    {
        $data["event"] = event::get();

        $waktu = strtotime(date('Y-m-d H:i:s'));

        foreach ($data["event"] as $item) {
            $tanggal = strtotime($item['selesai']);

            if ($waktu > $tanggal) {
                Persyaratan::where("event_id", $item->id)->delete();
                $item->delete();
                return redirect("/event");
            }
        }

        return view("pelatih.event.event", $data);
    }

    public function event_persyaratan($id)
    {
        $data["id"] = decrypt($id);
        $data["persyaratan"] = Persyaratan::where("event_id", decrypt($id))->where("pelatih_id", Auth::user()->pelatih->id)->get();

        return view('panitia.persyaratan.persyaratan', $data);
    }
}
