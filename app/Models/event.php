<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class event extends Model
{
    use SoftDeletes;

    protected $table = "events";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'Nama_Event', 'mulai', 'selesai'
    ];

    public $timestamps = false;
}
