<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baganevent extends Model
{
    protected $table ="baganevents";
    protected $primaryKey ="id";
    protected $fillable =[
        'id', 'gambar', 'Deskripsi'];
}
