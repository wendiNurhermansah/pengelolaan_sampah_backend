<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelola_tps3r extends Model
{
    protected $table = 'tm_kelola_tps3r';
    protected $guarded = [];

    public function kelola()
    {
        return $this->belongsTo(Kelola_tps3r::class, 'id_tps3r');
    }
}
