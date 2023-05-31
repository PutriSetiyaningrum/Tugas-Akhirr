<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCabangEvent extends Model
{
    protected $table = "jenis_cabang_events";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'Nama_Jenis_Cabang_Event'
    ];
}
