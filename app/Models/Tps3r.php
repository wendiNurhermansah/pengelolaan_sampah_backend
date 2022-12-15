<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tps3r extends Model
{
    protected $table = 'tm_tps3r';
    protected $guarded = [];

    public function jenis()
    {
        return $this->belongsTo(Jenis_tps3r::class, 'id_jenis');
    }

    public function status()
    {
        return $this->belongsTo(Status_tps3r::class, 'id_status');
    }
}
