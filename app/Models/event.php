<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class event extends Model
{
    use SoftDeletes;

    protected $table = "events";

    protected $guarded = [''];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }

    public function komentar()
    {
        return $this->hasMany("App\Models\Komentar", "id_event", "id");
    }
}
