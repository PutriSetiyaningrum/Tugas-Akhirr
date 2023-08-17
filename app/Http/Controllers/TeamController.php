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
use Termwind\Components\Dd;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $team = Team::latest()->get();
        $loggedInPelatih = auth()->user()->pelatih; // Pastikan relasi dengan model User adalah pelatih

        // Ambil tim yang terhubung dengan pelatih yang login
        $team = Team::where('pelatih_id', $loggedInPelatih->id)
            ->latest()
            ->get();

        $groupedTeams = $team->groupBy(['event_id'])->map(function ($group) {
            return $group->first();
        });
        return view('pelatih.team.team', compact('groupedTeams'));
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
                "event_id" => $request->event,
                "pelatih_id" => $request->pelatih,
                "kategori_id" => $request->kategori_id,
                "jenis_cabang_id" => $request->jenis_cabang_id,
                "status" => 1,
                "atlet_id" => $item
            ]);
        }

        return redirect('/team/')->with(
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

    public function detail($pelatih_id, $event_id)
    {
        $team = Team::where("pelatih_id", decrypt($pelatih_id))
            ->where("event_id", $event_id)
            ->get();

        return view("pelatih.team.detail-team", compact('team'));
    }

    public function team()
    {
        // Ambil tim yang terhubung dengan pelatih yang login
        $team = Team::all()->latest()->get();

        $groupedTeams = $team->groupBy(['event_id'])->map(function ($group) {
            return $group->first();
        });
        return view('panitia.team.team', compact('groupedTeams'));
    }

    public function detailteam($pelatih_id, $event_id)
    {
        $team = Team::where("event_id", $event_id)
            ->get();

        return view("pelatih.team.detail-team", compact('team'));
    }
}
