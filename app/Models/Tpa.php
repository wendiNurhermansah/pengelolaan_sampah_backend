<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tpa extends Model
{
    protected $table = 'tm_tpa';
    protected $guarded = [];

    public function jenis()
    {
        return $this->belongsTo(Jenis_tpa::class, 'id_jenis_tpa');
    }

    public function status()
    {
        return $this->belongsTo(Status_tpa::class, 'id_status_tpa');
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

    public function terkelola()
    {
        return $this->belongsTo(Sampah_terkelola::class, 'id', 'id_tpa');
    }

    public function data_oprasional()
    {
        return $this->belongsTo(Data_oprasional_tpa::class, 'id', 'id_tpa');
    }



}
