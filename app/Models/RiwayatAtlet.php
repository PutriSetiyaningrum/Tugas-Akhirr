<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatAtlet extends Model
{
    use HasFactory;

    protected $table = "riwayat_atlets";

    protected $guarded = [''];
}
