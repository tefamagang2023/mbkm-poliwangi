<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_jurusan',
    ];

    // relasi
    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }

    public function admin_jurusan()
    {
        return $this->hasMany(AdminJurusan::class);
    }
}
