<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama', 'email', 'no_telp', 'id_prodi', 'id_user'];

    // relasi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function doswal()
    {
        return $this->hasOne(DosenWali::class, 'id', 'id');
    }

    public function kaprodi()
    {
        return $this->hasMany(Kaprodi::class);
    }

    public function pendamping_lapang_mahasiswa()
    {
        return $this->hasMany(PendampingLapangMahasiswa::class);
    }

    public function dosen_wali()
    {
        return $this->hasMany(DosenWali::class, 'id_dosen', 'id');
    }
    public function dosen_pl()
    {
        return $this->hasMany(DosenPL::class, 'id_dosen', 'id');
    }
}
