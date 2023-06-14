<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\event;
use App\Models\Persyaratan;
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
        $event = event::latest()->get();
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
        $dtUpload = new event;
        $dtUpload->Nama_Event = $request->Nama_Event;
        $dtUpload->mulai = $request->mulai;
        $dtUpload->selesai = $request->selesai;
        $dtUpload->save();

        return redirect("/master/event");
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
        event::where("id", $id)->update([
            "Nama_Event" => $request->Nama_Event,
            "mulai" => $request->mulai,
            "selesai" => $request->selesai
        ]);
        return redirect("/master/event");
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

        return back();
    }

    public function data_event()
    {
        $data["event"] = event::get();

        return view("pelatih.event.event", $data);
    }

    public function event_persyaratan($id)
    {
        $data["id"] = $id;
        $data["persyaratan"] = Persyaratan::where("event_id", $id)->get();

        return view('panitia.persyaratan.persyaratan', $data);
    }
}
