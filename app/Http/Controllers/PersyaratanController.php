<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\event;
use App\Models\JenisCabangEvent;
use App\Models\kategorievent;
use App\Models\Persyaratan;
use Faker\Provider\ar_EG\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PersyaratanController extends Controller
{
    public function index()
    {
        if (Auth::user()->level == "panitia") {
            $data["persyaratan"] = Persyaratan::get();
        } else {
            $data["persyaratan"] = event::get();
        }

        return view('panitia.persyaratan.persyaratan', $data);
    }

    public function create($id)
    {
        $data["id"] = decrypt($id);
        $data["kategorievent"] = kategorievent::get();
        $data["jeniscabang"] = JenisCabangEvent::get();
        return view("pelatih.event.create-persyaratan", $data);
    }

    public function store(Request $request, $id)
    {
        if ($request->file("logo_sekolah")) {
            $logo_sekolah = $request->file("logo_sekolah")->store("logo_sekolah");
        }

        if ($request->file("surat_rekomendasi_kepala_sekolah")) {
            $surat_rekomendasi_kepala_sekolah = $request->file("surat_rekomendasi_kepala_sekolah")->store("surat_rekomendasi_kepala_sekolah");
        }

        if ($request->file("form_pendaftaran")) {
            $form_pendaftaran = $request->file("form_pendaftaran")->store("form_pendaftaran");
        }

        if ($request->file("foto")) {
            $foto = $request->file("foto")->store("foto");
        }

        if ($request->file("ijazah")) {
            $ijazah = $request->file("ijazah")->store("ijazah");
        }

        if ($request->file("akte")) {
            $akte = $request->file("akte")->store("akte");
        }

        Persyaratan::create([
            "event_id" => decrypt($id),
            "kategori_id" => $request->kategori_id,
            "jenis_cabang_id" => $request->jenis_cabang_id,
            "sekolah" => $request->sekolah,
            "logo_sekolah" => $logo_sekolah,
            "surat_rekomendasi_kepala_sekolah" => $surat_rekomendasi_kepala_sekolah,
            "form_pendaftaran" => $form_pendaftaran,
            "foto" => $foto,
            "ijazah" => $ijazah,
            "akte" => $akte,
            "pelatih_id" => Auth::user()->pelatih->id
        ]);

        return redirect('/event/persyaratan/' . $id);
    }

    public function edit($id_event, $id_persyaratan)
    {
        $data = [
            "id_event" => $id_event,
            "kategorievent" => kategorievent::get(),
            "jeniscabang" => JenisCabangEvent::get(),
            "edit" => Persyaratan::where("id", $id_persyaratan)->first()
        ];

        return view("panitia.persyaratan.edit-persyaratan", $data);
    }

    public function show($id)
    {
        $data["detail"] = Persyaratan::where("event_id", $id)->get();

        return view("panitia.persyaratan.detail", $data);
    }

    public function update(Request $request, $id_event, $id_persyaratan)
    {
        if ($request->file("logo_sekolah")) {
            if ($request->logo_sekolah_lama) {
                Storage::delete($request->logo_sekolah_lama);
            }

            $logo_sekolah = $request->file("logo_sekolah")->store("logo_sekolah");
        } else {
            $logo_sekolah = $request->logo_sekolah_lama;
        }


        if ($request->file("surat_rekomendasi_kepala_sekolah")) {
            if ($request->surat_rekomendasi_kepala_sekolah_lama) {
                Storage::delete($request->surat_rekomendasi_kepala_sekolah_lama);
            }
            $surat_rekomendasi_kepala_sekolah = $request->file("surat_rekomendasi_kepala_sekolah")->store("surat_rekomendasi_kepala_sekolah");
        } else {
            $surat_rekomendasi_kepala_sekolah = $request->surat_rekomendasi_kepala_sekolah_lama;
        }

        if ($request->file("form_pendaftaran")) {
            if ($request->form_pendaftaran_lama) {
                Storage::delete($request->form_pendaftaran_lama);
            }
            $form_pendaftaran = $request->file("form_pendaftaran")->store("form_pendaftaran");
        } else {
            $form_pendaftaran = $request->form_pendaftaran_lama;
        }

        if ($request->file("foto")) {
            if ($request->foto_lama) {
                Storage::delete($request->foto_lama);
            }
            $foto = $request->file("foto")->store("foto");
        } else {
            $foto = $request->foto_lama;
        }

        if ($request->file("ijazah")) {
            if ($request->ijazah_lama) {
                Storage::delete($request->ijazah_lama);
            }
            $ijazah = $request->file("ijazah")->store("ijazah");
        } else {
            $ijazah = $request->ijazah_lama;
        }

        if ($request->file("akte")) {
            if ($request->akte_lama) {
                Storage::delete($request->akte_lama);
            }
            $akte = $request->file("akte")->store("akte");
        } else {
            $akte = $request->akte_lama;
        }

        Persyaratan::where("id", $id_persyaratan)->update([
            "kategori_id" => $request->kategori_id,
            "jenis_cabang_id" => $request->jenis_cabang_id,
            "sekolah" => $request->sekolah,
            "logo_sekolah" => $logo_sekolah,
            "surat_rekomendasi_kepala_sekolah" => $surat_rekomendasi_kepala_sekolah,
            "form_pendaftaran" => $form_pendaftaran,
            "foto" => $foto,
            "ijazah" => $ijazah,
            "akte" => $akte,
            "status" => '3'

        ]);

        return redirect('/event/persyaratan/' . $id_event);
    }

    public function destroy(Request $request, $id_event, $id_persyaratan)
    {
        $persyaratan = Persyaratan::find($id_persyaratan);


        Storage::delete([
            $persyaratan->logo_sekolah,
            $persyaratan->surat_rekomendasi_kepala_sekolah,
            $persyaratan->form_pendaftaran,
            $persyaratan->foto,
            $persyaratan->ijazah,
            $persyaratan->akte
        ]);

        $persyaratan->delete();

        return redirect('/event/persyaratan/' . $id_event);
    }

    public function detail($id)
    {
        $data["persyaratan"] = Persyaratan::where("id", decrypt($id))->first();
        return view("panitia.persyaratan.detail-persyaratan", $data);
    }

    public function detail_event($id)
    {
        $data["persyaratan"] = Persyaratan::where("id", decrypt($id))->first();

        return view("panitia.persyaratan.detail-event", $data);
    }

    public function view_status($id)
    {
        $persyaratan = Persyaratan::where("id", decrypt($id))->first();

        return view("panitia.persyaratan.ubah_status", compact("persyaratan"));
    }

    public function ubah_status(Request $request, $id)
    {
        $cek = Persyaratan::where("id", decrypt($id))->first();

        if ($cek["deskripsi"] != NULL) {
            if ($request["deskripsi"] == NULL) {
                $deskripsi = NULL;
            } else {
                $deskripsi = $request->deskripsi;
            }
        } else {
            if ($request["deskripsi"]) {
                $deskripsi = $request["deskripsi"];
            } else {
                $deskripsi = NULL;
            }
        }

        Persyaratan::where("id", decrypt($id))->update([
            "status" => $request->status,
            "deskripsi" => $deskripsi
        ]);

        return redirect("/persyaratan");
    }
}
