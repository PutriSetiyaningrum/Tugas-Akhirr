<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounterArtikel extends Model
{
    use HasFactory;

    protected $table = "counter_event";

    protected $guarded = [''];
}
