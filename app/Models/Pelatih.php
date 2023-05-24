<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelatih extends Model
{
    use HasFactory;

    protected $table = "pelatih";

    protected $guarded = [''];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
        // return $this->belongsTo("App\Models\User", "user_id", "id");
    }
}
