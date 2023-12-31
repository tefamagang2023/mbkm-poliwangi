<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenilaianMagangExt extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nilai',
        'id_penilaian_magang_ext',
        'id_mahasiswa',
    ];

    // relasi
    public function penilaian_magang_ext()
    {
        return $this->belongsTo(PenilaianMagangExt::class, 'id_penilaian_magang_ext', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }
}
