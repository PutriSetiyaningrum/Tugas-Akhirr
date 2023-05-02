<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tentangperbasi extends Model
{
    protected $table ="tentangperbasis";
    protected $primaryKey ="id";
    protected $fillable =[
        'id', 'gambar', 'Deskripsi'];
}
