<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'kategori' => Kategori::all(),
        ];
        return view ('pages.admin.manajemen-kategori.kategori', $data);
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
            'create_nama' => ['required'],
        ]);

        Kategori::create([
            'nama' => $validated['create_nama'],
        ]);

        Alert::success('Success', 'Data Kategori Berhasil Ditambahkan');

        return redirect()->route('data.kategori.index');
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
        $validated = $request->validate([
            'update_nama' => ['required'],
        ]);

        Kategori::where('id', $id)->update([
            'nama' => $validated['update_nama'],
        ]);

        Alert::success('Success', 'Data Kategori Berhasil Diupdate');

        return redirect()->route('data.kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        Alert::success('Success', 'Data kategori Berhasil Dihapus');

        return redirect()->route('data.kategori.index');
    }
}