<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengunjung;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('user.landingpage.profil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::where("id", Auth::user()->id)->first();

        if (empty($user["foto"])) {
            if ($request->file("foto")) {
                $data = $request->file("foto")->store("profil_pengunjung");

                $user->foto = $data;
            }
        } else {
            if ($request->file("foto")) {
                Storage::delete($user->foto);

                $data = $request->file("foto")->store("profil_pengunjung");

                $user->foto = $data;
            } else {
                $data = $user->foto;
            }
        }

        User::where("id", Auth::user()->id)->update([
            "name" => $request["name"],
            "email" => $request["email"],
            "foto" => $data
        ]);

        Pengunjung::where("user_id", $user["id"])->update([
            "alamat" => $request->alamat,
            "telepon" => $request->telepon,
        ]);
        return back();
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
