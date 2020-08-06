<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard Kategori Motor';

        $kategoriMotors = Kategori::orderBy('nama_kategori')->get();

        return view('admin.product.kategori', compact('title', 'kategoriMotors',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Dashboard Tambah Kategori Motor';

        $tipeMotors = \App\Tipe::all('id', 'nama_tipe');

        return view('admin.product.create_kategori', compact('title', 'tipeMotors',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tipe'     => 'required',
            'nama_kategori' => 'required',
        ]);

        Kategori::create([
            'tipe_id'       => $request->nama_tipe,
            'nama_kategori' => $request->nama_kategori,
            'slug'          => str::slug($request->nama_kategori, '-'),
        ]);

        return redirect('/products/kategori-motor')->with('status', 'Kategori Motor Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        $title = 'Dashboard Kategori Motor';

        $tipeMotors = \App\Tipe::all('id', 'nama_tipe');

        return view('admin.product.update_kategori', compact('title', 'tipeMotors', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_tipe'     => 'required',
            'nama_kategori' => 'required',
        ]);

        $kategori->update([
            'tipe_id'       => $request->nama_tipe,
            'nama_kategori' => $request->nama_kategori,
            'slug'          => Str::slug($request->nama_kategori),
        ]);

        return redirect('products/kategori-motor');
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
