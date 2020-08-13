<?php

namespace App\Http\Controllers;

use App\Tipe;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Tipe Motor';

        $tipeMotors = Tipe::orderBy('nama_tipe')->get();

        return view('admin.product.tipe', compact('title', 'tipeMotors',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Tipe Motor';

        $kategoriMotors = \App\Kategori::all('id', 'nama_kategori');

        return view('admin.product.create_tipe', compact('title', 'kategoriMotors',));
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
            'nama_kategori'     => 'required',
            'nama_tipe'         => 'required',
        ]);

     Tipe::create([
            'kategori_id'   => $request->nama_kategori,
            'nama_tipe'     => $request->nama_tipe,
            'slug'          => str::slug($request->nama_tipe, '-'),
        ]);

        return redirect('/products/tipe-motor')->with('status',  'Tipe Motor Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show (Tipe $tipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit (Tipe $tipe)
    {
        $title = 'Edit Tipe Motor';
        
        $kategoriMotors = \App\Kategori::all('id', 'nama_kategori');

        return view('admin.product.update_tipe', compact('title', 'kategoriMotors', 'tipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipe $tipe)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'nama_tipe'     => 'required',
        ]);
		
         $tipe->update([
            'kategori_id'   => $request->nama_kategori,
            'nama_tipe'     => $request->nama_tipe,
            'slug'          => Str::slug($request->nama_tipe),
        ]);

        return redirect('products/tipe-motor');
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
