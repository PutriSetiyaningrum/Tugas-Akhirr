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
        Schema::create('riwayat_atlets', function (Blueprint $table) {
            $table->id();
            $table->integer("atlet_id");
            $table->integer("posisi_id");
            $table->string('event_id');
            $table->datetime('mulai');
            $table->datetime('selesai');
            $table->enum('status', [0, 1])->default(0);
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
        Schema::dropIfExists('riwayat_atlets');
    }
};
