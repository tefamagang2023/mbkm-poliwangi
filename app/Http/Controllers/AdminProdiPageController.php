<?php

namespace App\Http\Controllers;

use App\Models\AdminProdi;
use App\Models\Dosen;
use App\Models\DosenWali;
use App\Models\Kelas;
use App\Models\Kurikulum;
use App\Models\MagangExt;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class AdminProdiPageController extends Controller
{
    public function dashboard_admin_prodi()
    {
        $id_user = Auth::user()->id;
        $admin_prodi = AdminProdi::where('id_user', $id_user)->first();

        $data = [
            'mahasiswa_count' => Mahasiswa::where('id_prodi', $admin_prodi->id_prodi)->count(),
            'dosen_count' => Dosen::where('id_prodi', $admin_prodi->id_prodi)->count(),
            'kurikulum_count' => Kurikulum::where('id_prodi', $admin_prodi->id_prodi)->count(),
            'dosen_wali_count' => DosenWali::whereHas('dosen', function ($query) use ($admin_prodi) {
                $query->where('id_prodi', $admin_prodi->id_prodi);
            })->count(),
            'magang_ext_count' => MagangExt::where('id_prodi', $admin_prodi->id_prodi)->count(),
            'kelas_count' => Kelas::where('id_prodi', $admin_prodi->id_prodi)->count(),
        ];

        return view('pages.admin.admin-prodi-dashboard', $data);
    }
}
