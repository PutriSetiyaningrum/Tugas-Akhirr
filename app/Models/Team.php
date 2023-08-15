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
        return $this->belongsTo("App\Models\Pelatih", "pelatih_id", "id");
    }

    public function event()
    {
        return $this->belongsTo("App\Models\Event", "event_id", "id");
    }

    public function kategori()
    {
        return $this->belongsTo("App\Models\kategorievent", "kategori_id", "id");
    }

    public function cabang()
    {
        return $this->belongsTo("App\Models\JenisCabangEvent", "jenis_cabang_id", "id");
    }

    public function atlet()
    {
        return $this->belongsTo("App\Models\Atlet", "atlet_id", "id");
    }
}
