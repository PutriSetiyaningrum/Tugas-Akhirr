<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atlet extends Model
{
    protected $table = "atlets";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nama', 'tanggal_lahir', 'posisi'
    ];
}
