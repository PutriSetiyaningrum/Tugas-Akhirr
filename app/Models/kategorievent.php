<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategorievent extends Model
{
    protected $table = "kategorievents";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'Nama_Kategori_Event'
    ];
}
