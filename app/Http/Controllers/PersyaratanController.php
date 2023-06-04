<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\event;
use App\Models\JenisCabangEvent;
use App\Models\kategorievent;
use App\Models\Persyaratan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PersyaratanController extends Controller
{
    public function index()
    {
        $data["persyaratan"] = Persyaratan::get();
        return view('panitia.persyaratan.persyaratan', $data);
    }

    public function create($id)
    {
        $data["id"] = $id;
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
            "event_id" => $id,
            "kategori_id" => $request->kategori_id,
            "jenis_cabang_id" => $request->jenis_cabang_id,
            "sekolah" => $request->sekolah,
            "logo_sekolah" => $logo_sekolah,
            "surat_rekomendasi_kepala_sekolah" => $surat_rekomendasi_kepala_sekolah,
            "form_pendaftaran" => $form_pendaftaran,
            "foto" => $foto,
            "ijazah" => $ijazah,
            "akte" => $akte,
        ]);

        return redirect('/event/persyaratan/'.$id);
    }

    public function edit($id)
    {
        $data["kategorievent"] = kategorievent::get();
        $data["jeniscabang"] = JenisCabangEvent::get();
        $data["edit"] = Persyaratan::where("id", $id)->first();

        return view("panitia.persyaratan.edit-persyaratan", $data);
    }

    public function update(Request $request, Persyaratan $persyaratan)
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

        $persyaratan->update([
            "kategori_id" => $request->kategori_id,
            "jenis_cabang_id" => $request->jenis_cabang_id,
            "sekolah" => $request->sekolah,
            "logo_sekolah" => $logo_sekolah ?? $persyaratan->logo_sekolah,
            "surat_rekomendasi_kepala_sekolah" => $surat_rekomendasi_kepala_sekolah ?? $persyaratan->surat_rekomendasi_kepala_sekolah,
            "form_pendaftaran" => $form_pendaftaran ?? $persyaratan->form_pendaftaran,
            "foto" => $foto ?? $persyaratan->foto,
            "ijazah" => $ijazah ?? $persyaratan->ijazah,
            "akte" => $akte ?? $persyaratan->akte,
        ]);

        return redirect('/persyaratan');
    }

    public function destroy($id)
    {
        Persyaratan::where("id", $id)->delete();

        return back();
    }
}
