<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Atlet;
use App\Models\Pelatih;
use App\Models\kategorievent;
use App\Models\JenisCabangEvent;
use App\Models\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::latest()->get();
        return view('pelatih.team.team', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $data["atlet"]  = Atlet::where('pelatih_id', $user->pelatih->id)->latest()->get();
        $data["event"] = event::get();
        $data["Pelatih"] = Pelatih::get();
        $data["kategorievent"] = kategorievent::get();
        $data["jeniscabang"] = JenisCabangEvent::get();
        return view('pelatih.team.pilih-atlet', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->atlet_id as $item) {
            Team::create([
                "event_id" => 1,
                "pelatih_id" => 1,
                "kategori_id" => $request->kategori_id,
                "jenis_cabang_id" => $request->jenis_cabang_id,
                "status" => 1,
                "atlet_id" => $item
            ]);


            return redirect('/team/')->with(
                "message",
                "<div style='margin-top: 7px'>Success Data Anda Berhasil di Tambahkan</div>"
            );
        }
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
        //
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
        //
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

    public function detail_atlet($id)
    {
        $data["team"] = Team::where("id", decrypt($id))->first();

        return view("pelatih.team.detail-team", $data);
    }
}
