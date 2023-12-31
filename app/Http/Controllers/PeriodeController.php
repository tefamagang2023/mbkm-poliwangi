<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'periode' => Periode::orderBy('status', 'asc')->get(),
        ];

        return view('pages.prodi.periode.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'create_semester' => ['required'],
            'create_tahun' => ['required'],
            'create_status' => ['required'],
        ]);

        // jikalau request status tidak sama dengan tidak aktif
        if (!$request->create_status == 'Tidak Aktif') {
            // Nonaktifkan semua periode yang sebelumnya aktif
            Periode::where('status', 'Aktif')->update(['status' => 'Tidak Aktif']);
        }

        Periode::create([
            'semester' => $validated['create_semester'],
            'tahun' => $validated['create_tahun'],
            'status' => $validated['create_status'],
        ]);

        Alert::success('Success', 'Data Periode Berhasil Ditambahkan');

        return redirect()->route('manajemen.periode.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $periode = Periode::findOrFail($id);

        $validated = $request->validate([
            'update_semester' => 'required',
            'update_tahun' => 'required|numeric', // Pastikan tahun adalah angka
            'update_status' => 'required|in:Aktif,Tidak Aktif', // Pastikan status sesuai
        ]);

        if ($periode->status == 'Aktif' && $request->update_status == 'Tidak Aktif') {
            // Anda tidak dapat mengubah periode aktif menjadi tidak aktif
            Alert::error('Oops', 'Mohon Ubah Periode yang Tidak Aktif');
            return redirect()->back();
        }

        // Hanya jika status berubah menjadi Aktif, nonaktifkan periode lainnya
        if ($periode->status == 'Tidak Aktif' && $request->update_status == 'Aktif') {
            Periode::where('status', 'Aktif')->update(['status' => 'Tidak Aktif']);
        }

        $periode->update([
            'semester' => $validated['update_semester'],
            'tahun' => $validated['update_tahun'],
            'status' => $validated['update_status'],
        ]);

        Alert::success('Success', 'Data Periode Berhasil Diupdate');

        return redirect()->route('manajemen.periode.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
