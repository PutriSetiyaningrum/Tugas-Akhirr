<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tentangevent extends Model
{
    protected $table ="tentangevents";
    protected $primaryKey ="id";
    protected $fillable =[
        'id', 'gambar', 'Deskripsi'];
}
