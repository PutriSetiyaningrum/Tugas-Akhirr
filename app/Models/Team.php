<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = "teams";

    protected $guarded = [''];

    public function pelatih()
    {
        return $this->belongsTo("App\Models\Pelatih", "id", "user_id", "sekolah");
    }

    public function event()
    {
        return $this->belongsTo(event::class, "event_id", "id")->withTrashed();
    }
}
