<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProgram extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_jurusan',
    ];

    // relasi
    public function magang_ext()
    {
        return $this->hasMany(MagangExt::class);
    }
}