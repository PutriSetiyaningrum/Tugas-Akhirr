<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function event()
    {
        return $this->belongsTo(event::class, "event_id", "id");
    }

    public function kategori()
    {
        return $this->belongsTo("App\Models\kategorievent", "kategori_id", "id");
    }

    public function cabang()
    {
        return $this->belongsTo("App\Models\JenisCabangEvent", "jenis_cabang_id", "id");
    }
}
