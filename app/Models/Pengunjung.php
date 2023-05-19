<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    protected $table = "pengunjung";

    protected $guarded = [''];

    public function users()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }
}
