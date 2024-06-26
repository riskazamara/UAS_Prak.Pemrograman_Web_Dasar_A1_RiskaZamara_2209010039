<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamarStandar extends Model
{
    use HasFactory;

    protected $table = 'kamar_standar'; // Nama tabel di database

    protected $fillable = [
        'nomor_kamar',
        'jenis_tempat_tidur',
        'kapasitas',
        'ketersediaan',
    ];
}
