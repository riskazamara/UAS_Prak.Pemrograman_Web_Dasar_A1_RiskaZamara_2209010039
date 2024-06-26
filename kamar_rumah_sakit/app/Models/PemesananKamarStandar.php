<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemesananKamarStandar extends Model
{
    protected $table = 'pemesanan_kamar_standar';

    protected $fillable = [
        'nama', 'id_kamar', 'tanggal_checkin', 'tanggal_checkout'
    ];

    protected $dates = [
        'tanggal_checkin', 'tanggal_checkout'
    ];

    public function kamarStandar()
    {
        return $this->belongsTo(KamarStandar::class, 'id_kamar', 'id');
    }
}
