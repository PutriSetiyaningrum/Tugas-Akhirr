<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persyaratans', function (Blueprint $table) {
            $table->id();
            $table->string('event_id');
            $table->string('kategori_id');
            $table->string('jenis_cabang_id');
            $table->string('sekolah');
            $table->string('logo_sekolah');
            $table->string('surat_rekomendasi_kepala_sekolah');
            $table->string('form_pendaftaran');
            $table->string('foto');
            $table->string('ijazah');
            $table->string('akte');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persyaratans');
    }
};
