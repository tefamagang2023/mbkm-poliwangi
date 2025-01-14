<?php

namespace App\Http\Controllers;

use App\Models\AdminJurusan;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\DosenPL;
use App\Models\Kaprodi;
use App\Models\PelamarMagang;
use App\Models\PendampingLapangMahasiswa;
use App\Models\PesertaDosen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class DosenPLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan_id = AdminJurusan::where('id_user', Auth::user()->id)->first()->id_jurusan;

        $datas = [
            'dosens' => Dosen::where('id_jurusan', $jurusan_id)->get(),
            'jurusan' => Jurusan::find($jurusan_id),
            'dosen_pls' => Dosen::where('id_jurusan', $jurusan_id)
                ->with('dosen_pl') // Pastikan nama relasinya sesuai dengan yang didefinisikan di model Dosen
                ->get()
                ->pluck('dosen_pl') // Ambil semua DosenPL dari hasil query di atas
                ->flatten(),
            'id_jurusan' => $jurusan_id,
        ];

        return view('pages.kaprodi.pages-kaprodi.pl-mahasiswa.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_user = Auth()->user()->id;
        $admin_jurusan_user = AdminJurusan::where('id_user', $id_user)->first();
        $jurusan_user = $admin_jurusan_user->id_jurusan;

        // mengambil seluruh data dosen dengan role dosen
        $dosens = Dosen::where('id_jurusan', $jurusan_user)
            ->whereDoesntHave('dosen_pl')
            ->whereHas('user', function ($query) {
                $query->whereHas('roles', function ($query) {
                    $query->where('name', 'dosen');
                });
            })
            ->get();

        $data = [
            'dosens' => $dosens,
        ];

        return view('pages.kaprodi.pages-kaprodi.pl-mahasiswa.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dosens' => ['required', 'array', 'min:1'],
        ]);

        $dosen_pl_role = Role::where('name', 'dosen-pl')->first();

        $dosen_convert = collect($validated['dosens']);
        $check_id_dosen = $dosen_convert->except('_token');

        if ($check_id_dosen) {
            foreach ($check_id_dosen as $dosenId) {
                $dosen_user = Dosen::where('id', $dosenId)->first();
                $user = User::findOrFail($dosen_user->id_user);
                // $user->removeRole('dosen');

                DosenPL::create([
                    'id_dosen' => $dosenId,
                ]);

                $user->assignRole($dosen_pl_role);
            }
        }
        Alert::success('Success', 'Berhasil Menambahkan Dosen Pendamping Lapang');

        return redirect()->route('manajemen.dosen.pl.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_dosen_pl)
    {

        $data = [
            'dosen_pl' => DosenPL::findOrFail($id_dosen_pl),
            'id_dosen_pl' => $id_dosen_pl,
            'pendamping_lapang' => PendampingLapangMahasiswa::where('id_dosen_pl', $id_dosen_pl)->get(),
        ];

        return view('pages.kaprodi.pages-kaprodi.pl-mahasiswa.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen_role = Role::where('name', 'dosen')->first();

        $dosen_pl = DosenPL::findOrFail($id);
        $dosen_user = Dosen::where('id', $dosen_pl->id_dosen)->first();
        $user = User::findOrFail($dosen_user->id_user);
        $user->removeRole('dosen-pembimbing');
        $dosen_pl->delete();

        $user->assignRole($dosen_role);

        Alert::success('Success', 'Berhasil Mengahapus Dosen Pendamping Lapang');

        return redirect()->route('manajemen.dosen.pl.index');
    }
}
