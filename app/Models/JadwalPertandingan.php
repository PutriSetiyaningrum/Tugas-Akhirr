<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPertandingan extends Model
{
    protected $table = "jadwal_pertandingans";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'gambar', 'deskripsi'
    ];
}
