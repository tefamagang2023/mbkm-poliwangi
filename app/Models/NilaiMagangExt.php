<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMagangExt extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'file_transkrip',
        'file_sertifikat',
        'file_laporan_akhir',
        'validasi_kaprodi',
        'id_mahasiswa',
        'id_magang_ext',
        'id_periode',
    ];

    // relasi
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function magang_ext()
    {
        return $this->belongsTo(MagangExt::class, 'id_magang_ext', 'id');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id');
    }

    public function nilai_konversi()
    {
        return $this->hasMany(NilaiKonversi::class, 'id_nilai_magang_ext', 'id');
    }
}
