<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelamarMagang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'status_diterima',
        'id_mahasiswa',
        'id_lowongan',
    ];
}