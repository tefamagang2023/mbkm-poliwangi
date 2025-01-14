<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nim', 'nama', 'angkatan', 'email', 'no_telp', 'id_registrasi_mahasiswa', 'id_prodi', 'id_user'];

    // relasi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function peserta_kelas()
    {
        return $this->hasMany(PesertaKelas::class, 'id_mahasiswa', 'id');
    }

    public function peserta_magang_ext()
    {
        return $this->hasMany(PesertaMagangExt::class, 'id_mahasiswa', 'id');
    }

    public function mahasiswa_magang()
    {
        return $this->hasMany(MahasiswaMagang::class);
    }

    public function nilai_magang_ext()
    {
        return $this->hasMany(NilaiMagangExt::class);
    }

    public function nilai_magang()
    {
        return $this->hasMany(NilaiMagang::class);
    }

    public function pelamarMagang()
    {
        return $this->hasOne(PelamarMagang::class, 'id_mahasiswa', 'id');
    }

    public function berkas_pelamar()
    {
        return $this->hasMany(BerkasPelamar::class);
    }

    public function nilai_konversi()
    {
        return $this->hasMany(NilaiKonversi::class);
    }

    public function ketercapaian_cpl()
    {
        return $this->hasMany(KetercapaianCpl::class);
    }

    public function pendamping_lapang_mahasiswa()
    {
        return $this->hasMany(PendampingLapangMahasiswa::class);
    }

    public function log_book()
    {
        return $this->hasMany(Logbook::class);
    }

    public function laporan_mingguan()
    {
        return $this->hasMany(LaporanMingguan::class, 'id_mahasiswa', 'id');
    }

    public function detail_penilaian_magang_ext()
    {
        return $this->hasMany(DetailPenilaianMagangExt::class);
    }

    public function peserta_dosen()
    {
        return $this->hasMany(PesertaDosen::class, 'id_mahasiswa', 'id');
    }

    // Mahasiswa.php

    // public function laporanAkhir()
    // {
    //     return $this->hasOne(LaporanAkhir::class, 'id_mahasiswa', 'id');
    // }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id_user');
    }
}
