<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

        $kategoriMotors = Kategori::orderBy('nama_Kategori')->get();

        return view('admin.product.kategori', compact('title', 'kategoriMotors',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Dashboard Tambah Kategori Motor',
        ];

        return view('admin.product.create_kategori', $data);
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
            'nama_kategori' => 'required',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug'          => Str::slug($request->nama_kategori, '-'),
        ]);

        return redirect('/products/kategori-motor')->with('status', 'Kategori Motor Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        $data = [
            'title' => 'Dashboard Update Kategori Motor',
            'kategori'  => $kategori,
        ];

        return view('admin.product.update_kategori', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori->update([
                'nama_kategori' => $request->nama_kategori,
                'slug'          => Str::slug($request->nama_kategori, '-'),
            ]);

        return redirect('products/kategori-motor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
