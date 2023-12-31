<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
    ];

    // relasi
    public function mitra()
    {
        return $this->hasMany(Mitra::class);
    }
}
