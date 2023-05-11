<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hasilpertandingan extends Model
{
    protected $table ="hasilpertandingans";
    protected $primaryKey ="id";
    protected $fillable =[
        'id', 'gambar', 'Deskripsi'];
}
