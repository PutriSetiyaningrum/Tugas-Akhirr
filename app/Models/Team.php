<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [''];
    
    public function pelatih()
    {
        return $this->belongsTo("App\Models\Pelatih", "id", "user_id", "sekolah");
    }

    public function event()
    {
        return $this->belongsTo("App\Models\event", "event_id");
    }
}
