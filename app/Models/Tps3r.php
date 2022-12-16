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

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan');
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten');
    }
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi');
    }

    public function kelola()
    {
        return $this->belongsTo(Kelola_tps3r::class, 'id', 'id_tps3r');
    }
}
