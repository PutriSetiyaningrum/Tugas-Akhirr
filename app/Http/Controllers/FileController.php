<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Persyaratan;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function logo_sekolah($id)
    {
        $surat = Persyaratan::where("id", $id)->first();
        $path = storage_path("app/public/" . $surat["logo_sekolah"]);

        return response()->download($path);
    }

    public function surat_rekomendasi($id)
    {
        $surat = Persyaratan::where("id", $id)->first();
        $path = storage_path("app/public/" . $surat["surat_rekomendasi_kepala_sekolah"]);

        return response()->download($path);
    }

    public function form_pendaftaran($id)
    {
        $surat = Persyaratan::where("id", $id)->first();
        $path = storage_path("app/public/" . $surat["form_pendaftaran"]);

        return response()->download($path);
    }

    public function foto($id)
    {
        $surat = Persyaratan::where("id", $id)->first();
        $path = storage_path("app/public/" . $surat["foto"]);

        return response()->download($path);
    }

    public function ijazah($id)
    {
        $surat = Persyaratan::where("id", $id)->first();
        $path = storage_path("app/public/" . $surat["ijazah"]);

        return response()->download($path);
    }

    public function akte($id)
    {
        $surat = Persyaratan::where("id", $id)->first();
        $path = storage_path("app/public/" . $surat["akte"]);

        return response()->download($path);
    }
}
