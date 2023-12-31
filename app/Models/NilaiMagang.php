<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMagang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nilai_angka',
        'nilai_huruf',
        'id_mahasiswa',
        'id_kompetensi_program',
    ];

    // relasi
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }

    public function kompetensi_program()
    {
        return $this->belongsTo(KompetensiProgram::class, 'id_kompetensi_program', 'id');
    }
    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul', 'id');
    }


    // Definisikan relasi dengan NilaiKonversi
    public function nilai_konversi()
    {
        return $this->belongsTo(NilaiKonversi::class, 'id_nilai_konversi');
    }
}
